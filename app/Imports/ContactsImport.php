<?php
#{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
namespace App\Imports;

use App\Models\AddVariant;
use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Auth;
class ContactsImport implements ToCollection, WithStartRow
{
    public function startRow(): int
    {
        return 2; // Skip the first row and start from the second row
    }
    public function collection(Collection $rows)
    {
        //dd($rows);
        $loggedinuser = Auth::guard('customer')->user();
        foreach ($rows as $row) {
            // Ensure there are enough columns in the row
            if (count($row) < 10) {
                continue;
            }
            $type = isset($row[0]) ? trim($row[0]) : '';
            $fullname = isset($row[1]) ? trim($row[1]) : '';
            $email = isset($row[2]) ? trim($row[2]) : '';
            $phonenumber = isset($row[3]) ? trim($row[3]) : '';
            $city = isset($row[4]) ? trim($row[4]) : '';
            $state = isset($row[5]) ? trim($row[5]) : '';
            $country = isset($row[6]) ? trim($row[6]) : '';
            $language = isset($row[7]) ? trim($row[7]) : '';
            $address = isset($row[8]) ? trim($row[8]) : '';
            $status = isset($row[9]) ? trim($row[9]) : '';

            // Save data to the database
            $data = Contact::updateOrCreate(
                ['phonenumber' => '+91'.$phonenumber], // The criteria to search for duplicates in phonenumber
                [
                    'type' =>  $type,
                    'fullname' => $fullname,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state,
                    'country' => $country,
                    'language' => $language,
                    'address' => $address,
                    'status' => $status,
                    'userid' => $loggedinuser->id,
                ]
        );
        //dd($data);
        }
    }

}
