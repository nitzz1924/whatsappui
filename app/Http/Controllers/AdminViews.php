<?php
#{{--“मंज़िल उन्हीं को मिलती है जिनके सपनों में जान होती है, पंख से कुछ नहीं होता हौसलों से उड़ान होती है।”--}}
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViews extends Controller
{
   public function userregister(){
    return view('AdminPanel.register_users');
   }
}
