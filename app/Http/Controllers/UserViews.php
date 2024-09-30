<?php
#{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Contact;
use App\Models\GroupType;
use Illuminate\Http\Request;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Session;
use Auth;
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
        return redirect('/user/login');
    }
    public function indexchat()
    {
        $contactsdata = Contact::orderBy('created_at', 'DESC')->get();
        $groupsdata = GroupType::where('type', '=', 'Group')->orderBy('created_at', 'DESC')->get();
        $alltemplates = $this->getTemplateList();
        return view('UserPanel.indexchat',compact( 'contactsdata','groupsdata','alltemplates'));
    }
    public function campaignspage()
    {
        $campaigns = Campaign::orderBy('created_at','DESC')->get();
        return view('UserPanel.campaigns',compact('campaigns'));
    }
    public function addnewcampaign()
    {
        $alltemplates = $this->getTemplateList();
        //dd($alltemplates);
        $groupdata = GroupType::where('type', '=', 'Group')->get();
        $statusdata = GroupType::where('type', '=', 'Status')->get();
        return view('UserPanel.addnewcampaign', compact('groupdata', 'statusdata','alltemplates'));
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
        return view('UserPanel.analytics');
    }
    public function wahapage()
    {
        return view('UserPanel.whatsappapi');
    }
    public function templatespage()
    {
        $alltemplates = $this->getTemplateList();
        // dd($alltemplates);
        return view('UserPanel.templates',compact('alltemplates'));
    }
    public function groupspage()
    {
        $groupsdata = GroupType::orderBy('created_at', 'DESC')->get();
        return view('UserPanel.addgroups', compact('groupsdata'));
    }
    public function contactspage()
    {
        $groupsdata = GroupType::where('type', '=', 'Group')->orderBy('created_at', 'DESC')->get();
        $contactsdata = Contact::orderBy('created_at', 'DESC')->get();
        return view('UserPanel.contacts', compact('groupsdata', 'contactsdata'));
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

        $response = $client->get($apiBaseUrl . '/v20.0/'.$whatsbusinessid.'/message_templates');
        if ($response->successful()) {
            $templates = $response->json()['data'];
            return $templates;
             //dd($templates); // Replace with your desired handling of the template list
        } else {
            dd('Error fetching template list: ' . $response->body());
        }

    }
}
