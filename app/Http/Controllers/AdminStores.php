<?php
#{{--“मंज़िल उन्हीं को मिलती है जिनके सपनों में जान होती है, पंख से कुछ नहीं होता हौसलों से उड़ान होती है।”--}}
namespace App\Http\Controllers;

use App\Models\RegisterUser;
use Exception;
use Illuminate\Http\Request;

class AdminStores extends Controller
{
    public function insertregisterusers(Request $req){
        try{
            $req->validate([
                'userid' => 'required',
                'password' => 'required',
                'mobilenumber' => 'required',
                'email' => 'required|unique:register_users',
                'expiredate' => 'required',
                'createddate' => 'required',
            ]);
            $data = new RegisterUser();
            $data->userid = $req->userid;
            $data->password = $req->password;
            $data->mobilenumber = $req->mobilenumber;
            $data->email = $req->email;
            $data->expiredate = $req->expiredate;
            $data->createddate = $req->createddate;
            $data->save();
            return back()->with('success', 'User Registered.!');
        }catch(Exception $e){
            return redirect()->route('userregister')->with('error', $e->getMessage());
            //return redirect()->route('userregister')->with('error', 'Not Added Try Again...!!!!');
        }
    }

    public function deleteregisteruser($id){
        $data = RegisterUser::find($id);
        $data->delete();
        return back()->with('success', "Deleted....!!!");
    }

    public function updateaccountstatus(Request $req)
    {
        $accountstatus = RegisterUser::find($req->record_id);
        if ($accountstatus) {
            $accountstatus->accountstatus = $req->status;
            $accountstatus->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }

    public function updateuser(Request $request){
        try {
            $leads = RegisterUser::where('id', $request->userid)->update([
                'password' => $request->password,
                'mobilenumber' => $request->mobilenumber,
                'email' => $request->email,
                'expiredate' => $request->expiredate,
                'createddate' => $request->createddate,
            ]);
            return back()->with('success', "Updated..!!!");
        } catch (Exception $e) {
            //return back()->with('error', $e->getMessage());
            return back()->with('error', 'Not Updated..Try Again.....');
        }
    }
}
