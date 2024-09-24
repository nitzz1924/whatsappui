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
                'phonenumber' => $req->phonenumber,
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
        // dd($req->all());
        $loggedinuser = Auth::guard('customer')->user();
        try {
            $req->validate([
                'phonenumber' => 'required',
                'modulename' => 'required',
                'template' => 'required',
                'segmentname' => 'required',
            ]);

            //Single Image Upload
            if ($req->hasFile('mediaimage')) {
                $bannerimage = $req->file('mediaimage');
                $bannerimageName = time() . '.' . $bannerimage->getClientOriginalExtension();
                $uploadedPath = '/assets/images';
                $bannerimage->move(public_path($uploadedPath), $bannerimageName);
                // Store the full image path (e.g., http://example.com/assets/images/image.jpg)
                $bannerimagePath = url($uploadedPath . '/' . $bannerimageName);
            }

            $data = Campaign::create([
                'phonenumber' => $req->phonenumber,
                'modulename' => $req->modulename,
                'template' => $req->template,
                'segmentname' => $req->segmentname,
                'userid' => $loggedinuser->id,
                'sendimmediate' => $req->sendimmediate,
                'scheduledatetime' => $req->scheduledatetime,
                'mediaimage' => $bannerimagePath,
            ]);
            $finaldata = Campaign::find($data->id);
            //dd($finaldata);
            if ($req->sendimmediate == '0') {
                $this->dropMessage($finaldata->phonenumber, $finaldata->id, $finaldata->mediaimage);
            } else {
                dd("Campaign is for Scheduling");
            }
            return back()->with('success', 'Campaign Created.!');
        } catch (Exception $e) {
            return redirect()->route('addnewcampaign')->with('error', $e->getMessage());
            //return redirect()->route('addnewcampaign')->with('error', 'Not Added Try Again...!!!!');
        }
    }

    function dropMessage($phone, $templateid, $fileurl)
    {
        dd($phone, $templateid, $fileurl);
        // Replace with your actual token
        $token = env('TOKEN');

        // Prepare data payload
        $data = [
            'messaging_product' => 'whatsapp',
            'to' => $phone,
            'type' => 'template',
            'template' => [
                'name' => $templateid,
                'language' => ['code' => 'en_US']
            ]
        ];

        // Send the request using Laravel's HTTP client
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json'
        ])->post('https://graph.facebook.com/v20.0/282520401622445/messages', $data);

        // Handle response
        if ($response->successful()) {
            return back()->with('success', 'Message sent successfully!');
        } else {
            return back()->withErrors('Message failed to send: ' . $response->body());
        }
    }
}
