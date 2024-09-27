<?php
#{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Contact;
use App\Models\GroupType;
use App\Models\RegisterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;
use Exception;
class UserStores extends Controller
{
    public function signup_user_otp(Request $request)
    {
        $mobilenumber = $request->phonenumber;
        $randomNumber = rand(100000, 999999);
        $user = RegisterUser::where('mobilenumber', '=', $mobilenumber)->first();
        if ($user) {
            $user->update([
                'otp' => $randomNumber,
                'password' => bcrypt($randomNumber),
            ]);
            $responseDatatest = [
                'msg' => 'success',
                'data' => $user->toArray(),
            ];
        } else {
            $responseDatatest = [
                'msg' => 'failure',
            ];
        }
        return response()->json($responseDatatest);
    }

    public function verifyotp(Request $request)
    {

        $reqdata = [$request->otptest1, $request->otptest2, $request->otptest3, $request->otptest4, $request->otptest5, $request->otptest6];
        $optnumber = implode($reqdata);
        // $credentials = [
        //     'mobilenumber' => $request->phonenumber,
        //     'password' => bcrypt($request->phonenumber),
        // ];
        if ($request->password == $optnumber) {
            $credentials = $request->only('mobilenumber', 'password');
            $data = RegisterUser::where('mobilenumber', '=', $credentials['mobilenumber'])
                ->first();

            if ($data && Auth::guard('customer')->attempt($credentials)) {
                // If data is found, redirect to user dashboard
                return redirect()->route('indexchat');
            }
        } else {
            return back()->with('error', 'OTP is Wrong');
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
        $token = env('TOKEN');
        $data = [
            'messaging_product' => 'whatsapp',
            'to' => $phone,
            'type' => 'template',
            'template' => [
                'name' => $templateid,
                'language' => ['code' => $languagetype],
                'components' => []
            ]
        ];
        if ($fileurl) {
            $data['template']['components'][] = [
                'type' => 'header',
                'parameters' => [
                    [
                        'type' => $mediatype,
                        'image' => [
                            'link' => 'https://www.businessinsider.in/_next/image?url=https%3A%2F%2Fstaticbiassets.in%2Fthumb%2Fmsid-103430412%2Cwidth-700%2Cresizemode-4%2Cimgsize-64934%2Fimg5f57ecd6e6ff30001d4e79d0.jpg&w=640&q=75'
                        ]
                    ]
                ]
            ];
        }
        //dd($data);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json'
        ])->post('https://graph.facebook.com/v20.0/282520401622445/messages', $data);
        // Handle response
        if ($response->successful()) {
            //  dd($response->body());
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
                'phonenumber' => '+91'.$req->phonenumber,
                'city' => $req->city,
                'state' => $req->state,
                'country' => $req->country,
                'language' => $req->language,
                'address' => $req->address,
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

}
