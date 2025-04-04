<?php
#{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Contact;
use App\Models\GroupType;
use App\Models\Message;
use App\Models\RegisterUser;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;
use Exception;
use Carbon\Carbon;
use Log;
use Illuminate\Support\Facades\File;
class UserStores extends Controller
{
    public function signup_user_otp(Request $request)
    {
        $credentials = $request->only('mobilenumber', 'password');
        $data = RegisterUser::where('mobilenumber', '=', $credentials)->first();
        if ($data && Auth::guard('customer')->attempt($credentials)) {
            // dd($data);
            return redirect()->route('indexchat');
        }
        return redirect()->route('userloginpage')->with('error', 'Invalid credentials');
    }

    public function insertgroups(Request $req)
    {
        $loggedinuser = Auth::guard('customer')->user();
        try {
            $req->validate([
                'type' => 'required',
                'label' => 'required',
            ]);
            $data = GroupType::create([
                'userid' => $loggedinuser->id,
                'type' => $req->type,
                'label' => $req->label,
            ]);
            return back()->with('success', 'Group Master Created.!');
        } catch (Exception $e) {
            return redirect()->route('groupspage')->with('error', $e->getMessage());
            //return redirect()->route('groupspage')->with('error', 'Not Added Try Again...!!!!');
        }
    }

    public function deletegroup($id)
    {
        $data = GroupType::find($id);
        $data->delete();
        return back()->with('success', "Deleted....!!!");
    }

    public function insertcontacts(Request $req)
    {
        $loggedinuser = Auth::guard('customer')->user();
        try {
            $req->validate([
                'type' => 'required',
                'fullname' => 'required',
                'phonenumber' => 'required|unique:contacts',
            ]);
            $data = Contact::create([
                'userid' => $loggedinuser->id,
                'type' => $req->type,
                'fullname' => $req->fullname,
                'email' => $req->email,
                'phonenumber' => '+91' . $req->phonenumber,
                'city' => $req->city,
                'state' => $req->state,
                'country' => $req->country,
                'language' => $req->language,
                'address' => $req->address,
                'status' => $req->status,
            ]);
            return back()->with('success', 'Contact Created.!');
        } catch (Exception $e) {
            return redirect()->route('contactspage')->with('error', $e->getMessage());
            //return redirect()->route('contactspage')->with('error', 'Not Added Try Again...!!!!');
        }
    }

    public function sendmessage(Request $req)
    {
        $loggedinuser = Auth::guard('customer')->user();
        if (!$loggedinuser) {
            return redirect()->route('userloginpage')->with('error', 'You must be logged in to perform this action.');
        }

        try {
            $req->validate([
                'campaignname' => 'required',
                'modulename' => 'required',
                'template' => 'required',
                'segmentname' => 'required',
            ]);
            $contacts = Contact::where('type', '=', $req->modulename)->where('status', $req->segmentname)->get();
            // dd($contacts);
            $bannerimagePath = '';
            // Single Image Upload
            if ($req->hasFile('mediaimage')) {
                $bannerimage = $req->file('mediaimage');
                $bannerimageName = time() . '.' . $bannerimage->getClientOriginalExtension();
                $uploadedPath = '/assets/images/templates';
                $bannerimage->move(public_path($uploadedPath), $bannerimageName);
                // Store the full image path
                $bannerimagePath = url($uploadedPath . '/' . $bannerimageName);
            }
            $data = Campaign::create([
                'campaignname' => $req->campaignname,
                'modulename' => $req->modulename,
                'template' => $req->template,
                'segmentname' => $req->segmentname,
                'userid' => $loggedinuser->id,
                'sendimmediate' => $req->sendimmediate,
                'scheduledatetime' => $req->scheduledatetime,
                'datetime' => $req->datetime,
                'mediatype' => $req->mediatype,
                'languagetype' => $req->languagetype,
                'mediaimage' => $bannerimagePath != null ? $bannerimagePath : null,
            ]);

            $finaldata = Campaign::find($data->id);
            if ($req->sendimmediate == '0') {
                //Sending Messages in Bulk
                foreach ($contacts as $contact) {
                    $this->dropMessage($contact->phonenumber, $finaldata->template, $finaldata->mediaimage, $finaldata->mediatype, $finaldata->languagetype);
                }
            } else {
                return back()->with('success', 'Campaign is for Scheduling.');
            }
            return back()->with('success', 'Campaign Created.!');
        } catch (Exception $e) {
            return redirect()->route('addnewcampaign')->with('error', $e->getMessage());
        }
    }

    function dropMessage($phone, $templateid, $fileurl, $mediatype, $languagetype)
    {
        //dd($phone, $templateid, $fileurl, $mediatype, $languagetype);

        $loggedinuser = Auth::guard('customer')->user();
        $accessToken = $loggedinuser->apptoken;

        $phonenumberid = $loggedinuser->phonenumberid;
        $data = [
            'messaging_product' => 'whatsapp',
            'to' => $phone,
            'type' => 'template',
            'template' => [
                'name' => $templateid,
                'language' => [
                    'code' => $languagetype ? $languagetype : 'en', // Ensure a fallback value    // This is required value at any case otherwise API will not work
                ],
                'components' => []
            ]
        ];
       
        if ($fileurl && $mediatype) {
            $data['template']['components'][] = [
                'type' => 'header',
                'parameters' => [
                    [
                        'type' => $mediatype,
                        $mediatype => ['link' => $fileurl]
                    ]
                ]
            ];
        }
        // dd($data);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json'
        ])->post('https://graph.facebook.com/v20.0/' . $phonenumberid . '/messages', $data);
        // dd([
        //     'status' => $response->status(),
        //     'body' => $response->body(),
        //     'error' => $response->json()
        // ]);
        // Handle response
        if ($response->successful()) {
            //dd($response->body());
            $templatedata = Template::where('name', $templateid)->where('userid', $loggedinuser->id)->first();
            $data = Message::create([
                'userid' => $loggedinuser->id,
                'templatename' => $templateid,
                'imageurl' => $fileurl,
                'type' => 'Sent',
                'senderid' => $loggedinuser->mobilenumber,
                'recievedid' => str_replace('+', '', $phone),
                'message' => $templatedata->components,
            ]);
            return back()->with('success', 'Message sent successfully!');

        } else {
            return back()->withErrors('Message failed to send: ' . $response->body());
        }
    }

    public function deletecampaign($id)
    {
        $data = Campaign::find($id);
        $data->delete();
        return back()->with('success', "Deleted....!!!");
    }

    public function deletecontact($id)
    {
        $data = Contact::find($id);
        $data->delete();
        return back()->with('success', "Deleted....!!!");
    }

    public function updatecontact(Request $req)
    {
        try {
            $contact = Contact::where('id', $req->contactid)->update([
                'type' => $req->type,
                'fullname' => $req->fullname,
                'email' => $req->email,
                'phonenumber' => '+91' . $req->phonenumber,
                'city' => $req->city,
                'state' => $req->state,
                'country' => $req->country,
                'language' => $req->language,
                'address' => $req->address,
                'status' => $req->status,
            ]);
            return back()->with('success', "Updated..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
            //return back()->with('error', 'Not Updated..Try Again.....');
        }
    }
    public function updategroups(Request $req)
    {
        try {
            $contact = GroupType::where('id', $req->groupid)->update([
                'type' => $req->type,
                'label' => $req->label,
            ]);
            return back()->with('success', "Updated..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
            //return back()->with('error', 'Not Updated..Try Again.....');
        }
    }

    public function sendsinglemessage(Request $req)
    {

        $bannerimagePath = $req->mediaimage;
        // dd($req->mediatype);
        try {
            $this->dropMessage($req->phonenumber, $req->template, $bannerimagePath, $req->mediatype, $req->languagetype);
            return back()->with('success', 'Message Sent.!');
        } catch (Exception $e) {
            return redirect()->route('indexchat')->with('error', $e->getMessage());
        }
    }

    public function getscheduledcam(Request $req)
    {

        $currentDateTime = Carbon::now()->format('Y-m-d\TH:i');
        $oneHourLater = Carbon::now()->addHour()->format('Y-m-d\TH:i');

        // Query campaigns that were scheduled between one hour ago and now
        $campaigns = Campaign::whereBetween('datetime', [$currentDateTime, $oneHourLater])->get();
        //dd( $campaigns);
        foreach ($campaigns as $data) {
            $contacts = Contact::where('type', '=', $data->modulename)->where('status', $data->segmentname)->get();
            $user = RegisterUser::where('id', $data->userid)->first();
            foreach ($contacts as $con) {
                //dd($con);
                $this->dropMessageapi($con->phonenumber, $data->template, $data->mediaimage, $data->mediatype, $data->languagetype, $user->apptoken, $user->phonenumberid);
            }
        }
        //Prepare the response
        $response = [
            'message' => 'Here is your Campaign List scheduled in the last hour...',
            'success' => true,
            'data' => $campaigns,
        ];

        // Return as JSON response
        return response()->json($response, 200);
    }

    function dropMessageapi($phone, $templateid, $fileurl, $mediatype, $languagetype, $accessToken, $phonenumberid)
    {
        //dd($phone, $templateid, $fileurl, $mediatype, $languagetype, $accessToken, $phonenumberid);
        $data = [
            'messaging_product' => 'whatsapp',
            'to' => $phone,
            'type' => 'template',
            'template' => [
                'name' => $templateid,
                'language' => [
                    'code' => $languagetype ?? 'en_US', // Ensure a fallback value    // This is required value at any case otherwise API will not work
                ],
                'components' => []
            ]
        ];
        if ($fileurl && $mediatype) {
            $data['template']['components'][] = [
                'type' => 'header',
                'parameters' => [
                    [
                        'type' => $mediatype,
                        'image' => [
                            'link' => $fileurl,
                        ]
                    ]
                ]
            ];
        }
        //dd($data);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json'
        ])->post('https://graph.facebook.com/v20.0/' . $phonenumberid . '/messages', $data);

        Log::info('WhatsApp API response: ', [$response->body()]);
        // Handle response
        if ($response->successful()) {
            return back()->with('success', 'Message sent successfully!');
        } else {
            return back()->withErrors('Message failed to send: ' . $response->body());
        }
    }

    public function verify(Request $request)
    {
        $hubVerifyToken = env('WHATSAPP_VERIFY_TOKEN');
        $hubChallenge = $request->query('hub_challenge');
        $hubVerifyTokenQuery = $request->query('hub_verify_token');

        // Check if the request is a GET request and if the token matches
        if ($request->isMethod('get') && $hubVerifyTokenQuery === $hubVerifyToken) {
            return response($hubChallenge, 200);
        }

        return response('Forbidden', 403);
    }

    public function handleWebhook(Request $request)
    {
        Log::info($request->all());
        return response('EVENT_RECEIVED', 200);
    }

    public function refreshtemplates()
    {
        $loggedinuser = Auth::guard('customer')->user();
        $alltemplates = $this->getTemplateList();

        try {
            foreach ($alltemplates as $data) {
                Template::firstOrCreate(
                    ['templateid' => $data['id']], // Search for this templateid
                    [
                        'userid' => $loggedinuser->id,
                        'name' => $data['name'],
                        'components' => json_encode($data['components']),
                        'language' => $data['language'],
                        'status' => $data['status'],
                        'category' => $data['category'],
                        'sub_category' => isset($data['sub_category']) ? $data['sub_category'] : null,
                    ]
                );
            }
            return back()->with('success', 'Templates Refreshed!');
        } catch (Exception $e) {
            return redirect()->route('templatespage')->with('error', $e->getMessage());
        }
    }

    function getTemplateList()
    {
        $loggedinuser = Auth::guard('customer')->user();
        $accessToken = $loggedinuser->apptoken;
        $whatsbusinessid = $loggedinuser->Wabaid;
        $apiBaseUrl = 'https://graph.facebook.com/';

        $client = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ]);

        $response = $client->get($apiBaseUrl . '/v20.0/' . $whatsbusinessid . '/message_templates');
        if ($response->successful()) {
            $templates = $response->json()['data'];
            return $templates;
            //dd($templates); // Replace with your desired handling of the template list
        } else {
            dd('Error fetching template list: ' . $response->body());
        }

    }

    public function replyamessage(Request $request)
    {
        // dd($request->all());
        $loggedinuser = Auth::guard('customer')->user();
        $phonenumberid = $loggedinuser->phonenumberid;
        $apiUrl = "https://graph.facebook.com/v20.0/{$phonenumberid}/messages";
        $accessToken = $loggedinuser->apptoken;

        // Prepare the data for the request
        $data = [
            'messaging_product' => 'whatsapp',
            'to' => $request->mobilenumber,
            'text' => [
                'body' => $request->resolvemessagetext,
            ]
        ];
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ])->post($apiUrl, $data);

            // Check the response status
            if ($response->successful()) {
                Log::info('Message sent successfully', ['phone' => $request->mobilenumber, 'message' => $request->resolvemessagetext]);
                $data = Message::create([
                    'userid' => $loggedinuser->id,
                    'type' => 'Sent',
                    'senderid' => $loggedinuser->mobilenumber,
                    'message' =>  $request->resolvemessagetext,
                    'recievedid' =>  str_replace('+', '',$request->mobilenumber),
                ]);
                return back()->with('success', 'Message sent successfully!');
            } else {
                Log::error('Error sending message', ['status' => $response->status(), 'body' => $response->body()]);
                return back()->withErrors('Message failed to send: ' . $response->body());
            }
        } catch (Exception $e) {
            Log::error('Exception sending message', ['message' => $e->getMessage()]);
        }
    }

    public function filtercontacts(Request $req)
    {
        $loggedinuser = Auth::guard('customer')->user();
        $contacts = Contact::where('userid', $loggedinuser->id)->where('type', $req->type)->where('status', $req->status)->get();
       return response()->json($contacts);
    }

    public function filtercontactsbycampaign(Request $req)
    {
        $loggedinuser = Auth::guard('customer')->user();
        $data = Campaign::where('userid', $loggedinuser->id)
        ->where('campaignname', $req->campaign)
        ->first();
        $contacts = Contact::where('userid', $loggedinuser->id)
        ->where('type', $data->modulename)
        ->where('status', $data->segmentname)->get();
        // dd($contacts);
        return response()->json($contacts);
    }
    public function insertMedia(Request $request)
    {
        $authuser = Auth::guard('customer')->user();
        try {
            $mediaImages = [];
            if ($request->hasFile('mediaImages')) {
                $request->validate([
                    'mediaImages.*' => 'required|mimes:jpeg,png,jpg,mp4,mov,avi',
                ]);

                $files = $request->file('mediaImages');
                foreach ($files as $file) {
                    $imageFullName = time() . '_' . $file->getClientOriginalName();
                    $uploadedPath = public_path("assets/images/Media/{$authuser->id}");
                    $file->move($uploadedPath, $imageFullName);
                    $mediaImages[] = asset("assets/images/Media/{$authuser->id}" . $imageFullName);
                    $Imagenames[] =  $imageFullName;
                }
            }

            return response()->json([
                'message' => 'Media inserted successfully!',
                'images' => $mediaImages, // Return images list to AJAX
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }
    public function removegalleryitem(Request $request){
        $authuser = Auth::guard('customer')->user();
        $filename = public_path("assets/images/Media/{$authuser->id}" . basename($request->url));
        if (File::exists($filename)) {
            File::delete($filename);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }
}
