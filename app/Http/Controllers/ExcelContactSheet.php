<?php
#{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ContactsImport;
use Excel;
class ExcelContactSheet extends Controller
{
    public function import(Request $request)
    {
        try {
            Excel::import(new ContactsImport, $request->file('file'));
    
            if (session()->has('error')) {
                return redirect()->back()->with('error', session('error'));
            }
    
            return redirect()->back()->with('success', 'Contacts imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
