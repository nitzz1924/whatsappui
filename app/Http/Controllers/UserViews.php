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
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Session;
use Auth;
use DB;
use Carbon\Carbon;
class UserViews extends Controller
{
    public function userloginpage()
    {
        return view('auth.UserPanel.login');
    }
    public function userdashboard()
    {
        return view('UserPanel.userdashboard');
    }
    public function logoutuserpanel()
    {
        Session::flush();
        Auth::guard('customer')->logout();
        return redirect('/');
    }
    public function indexchat()
    {
        $loggedinuser = Auth::guard('customer')->user();
        if (Auth::guard('customer')->check()) {
            $contactsdata = Contact::where('userid', $loggedinuser->id)->orderBy('created_at', 'DESC')->get();
            $groupsdata = GroupType::where('userid', $loggedinuser->id)->where('type', '=', 'Group')->orderBy('created_at', 'DESC')->get();
            $alltemplates = Template::where('userid', $loggedinuser->id)->get();
            $chat = Message::where('userid', $loggedinuser->id)->get();
            $allcampaigns = Campaign::where('userid', $loggedinuser->id)->get();
            $status = GroupType::where('userid', $loggedinuser->id)->where('type', '=', 'Status')->orderBy('created_at', 'DESC')->get();


             $recmessages = Message::join(DB::raw("(SELECT *, REPLACE(phonenumber, '+', '') as phone_no FROM contacts) as contacts"), function($join) {
                    $join->on('messages.senderid', '=', 'contacts.phone_no');
                })
                ->select('messages.*', 'contacts.fullname as contactname')
                ->where('messages.userid', $loggedinuser->id)
                ->where('messages.type', '=', 'Received')
                ->whereDate('messages.created_at', Carbon::today())
                ->get();

            return view('UserPanel.indexchat', compact('contactsdata', 'groupsdata', 'alltemplates', 'chat', 'allcampaigns', 'groupsdata','status','recmessages'));
        } else {
            return view('auth.UserPanel.login');
        }
    }
    public function campaignspage()
    {
        $loggedinuser = Auth::guard('customer')->user();
        if (Auth::guard('customer')->check()) {
            $campaigns = Campaign::where('userid', '=', $loggedinuser->id)->orderBy('created_at', 'DESC')->get();
            //dd( $campaigns);
            return view('UserPanel.campaigns', compact('campaigns'));
        } else {
            return view('auth.UserPanel.login');
        }
    }
    public function addnewcampaign()
    {
        $loggedinuser = Auth::guard('customer')->user();
        $alltemplates = Template::where('userid', $loggedinuser->id)->get();
        $groupdata = GroupType::where('userid', $loggedinuser->id)->where('type', '=', 'Group')->get();
        // dd($groupdata);
        $statusdata = GroupType::where('userid', $loggedinuser->id)->where('type', '=', 'Status')->get();
        return view('UserPanel.addnewcampaign', compact('groupdata', 'statusdata', 'alltemplates'));
    }
    public function automationpage()
    {
        return view('UserPanel.automations');
    }
    public function addnewautomation()
    {
        return view('UserPanel.addnewautomation');
    }
    public function analyticspage()
    {
        $loggedinuser = Auth::guard('customer')->user();
        if (Auth::guard('customer')->check()) {
            $sentmsgcount = Message::where('type', '=', 'Sent')->where('userid', $loggedinuser->id)->get()->count();
            $recmsgcount = Message::where('type', '=', 'Received')->where('userid', $loggedinuser->id)->get()->count();
            $contactscount = Contact::where('userid', $loggedinuser->id)->get()->count();
            $tempcount = Template::where('userid', $loggedinuser->id)->get()->count();
            $campaignscnt = Campaign::where('userid', $loggedinuser->id)->get()->count();
            $messages = Message::where('userid', $loggedinuser->id)->where('type', '=', 'Received')->whereDate('created_at', Carbon::today())->get();
            //dd($messages);
            return view('UserPanel.analytics', compact('sentmsgcount', 'recmsgcount', 'messages', 'contactscount', 'tempcount', 'campaignscnt'));
        } else {
            return view('auth.UserPanel.login');
        }
    }
    public function wahapage()
    {
        return view('UserPanel.whatsappapi');
    }
    public function templatespage()
    {
        if (Auth::guard('customer')->check()) {
            $alltemplates = $this->getTemplateList();
            //dd($alltemplates);
            return view('UserPanel.templates', compact('alltemplates'));
        } else {
            return view('auth.UserPanel.login');
        }
    }
    public function groupspage()
    {
        $loggedinuser = Auth::guard('customer')->user();
        $groupsdata = GroupType::orderBy('created_at', 'DESC')->where('userid', $loggedinuser->id)->get();
        return view('UserPanel.addgroups', compact('groupsdata'));
    }
    public function contactspage()
    {
        if (Auth::guard('customer')->check()) {
            $loggedinuser = Auth::guard('customer')->user();
            $groupsdata = GroupType::where('userid', $loggedinuser->id)->where('type', '=', 'Group')->orderBy('created_at', 'DESC')->get();
            $status = GroupType::where('userid', $loggedinuser->id)->where('type', '=', 'Status')->orderBy('created_at', 'DESC')->get();
            $contactsdata = Contact::where('userid', $loggedinuser->id)->orderBy('created_at', 'DESC')->get();
            $contactscnt = Contact::where('userid', $loggedinuser->id)->get()->count();
            return view('UserPanel.contacts', compact('groupsdata', 'contactsdata','status','contactscnt'));
        } else {
            return view('auth.UserPanel.login');
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
            //dd($templates); // Replace with your desired handling of the template list
            return $templates;
        } else {
            dd('Error fetching template list: ' . $response->body());
        }

    }
    public function showsentmessage($phone)
    {
        $loggedinuser = Auth::guard('customer')->user();
        $finalphone = str_replace('+', '', $phone);

        $sentMessage = Message::where('userid', $loggedinuser->id)
            ->where(function ($query) use ($finalphone) {
                $query->where('senderid', $finalphone)
                    ->orWhere('recievedid', $finalphone);
            })
            ->get();
        return response()->json($sentMessage);
    }
}
