<?php
#{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
namespace App\Http\Controllers;

use App\Models\RegisterUser;
use Illuminate\Http\Request;

class AdminViews extends Controller
{
   public function userregister(){
    return view('AdminPanel.register_users');
   }
   public function alluserslist(){
    $allusers = RegisterUser::orderBy('created_at','Desc')->get();
    return view('AdminPanel.allusers',compact('allusers'));
   }
}
