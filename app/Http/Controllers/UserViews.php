<?php
#{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function indexchat(){
        return view('UserPanel.indexchat');
    }
    public function campaignspage(){
        return view('UserPanel.campaigns');
    }
    public function addnewcampaign(){
        return view('UserPanel.addnewcampaign');
    }
    public function automationpage(){
        return view('UserPanel.automations');
    }
    public function addnewautomation(){
        return view('UserPanel.addnewautomation');
    }
    public function analyticspage(){
        return view('UserPanel.analytics');
    }
    public function wahapage(){
        return view('UserPanel.whatsappapi');
    }
    public function templatespage(){
        return view('UserPanel.templates');
    }
}
