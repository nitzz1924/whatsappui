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
        //dd($request->all());
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Process the Excel file
        Excel::import(new ContactsImport, $file);

        return redirect()->back()->with('success', 'Contacts Uploaded.');
    }
}
