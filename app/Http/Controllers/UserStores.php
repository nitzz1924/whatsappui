<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use Illuminate\Http\Request;
use Auth;
class UserStores extends Controller
{
    public function signup_user_otp(Request $request)
    {
        $mobilenumber = $request->phonenumber;
        $randomNumber = rand(100000, 999999);
        $user = RegisterUser::where('mobilenumber', '=', $mobilenumber)->first();
        if ($user) {
            $user->update([
                'password' => $randomNumber,
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
        //dd($request->all());
        $reqdata = [$request->otptest1,$request->otptest2,$request->otptest3,$request->otptest4,$request->otptest5,$request->otptest6];
        $optnumber = implode($reqdata);
        $credentials = [
            'mobilenumber' => $request->phonenumber,
            'password' => $optnumber,
        ];
        $data = RegisterUser::where('mobilenumber', '=', $credentials['mobilenumber'])
        ->where('password', '=', $credentials['password'])
        ->first();

        if ($data) {
            //dd("Authentication passed");
            // If data is found, redirect to user dashboard
            return redirect()->route('indexchat');
        }
        return redirect()->route('userloginpage')->with('error', 'Invalid credentials');
    }

}
