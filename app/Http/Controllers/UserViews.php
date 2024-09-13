<?php
#{{--#“मंज़िल उन्हीं को मिलती है जिनके सपनों में जान होती है, पंख से कुछ नहीं होता हौसलों से उड़ान होती है।”--}}
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
}
