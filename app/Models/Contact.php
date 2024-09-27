<?php
#{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'type',
        'fullname',
        'email',
        'phonenumber',
        'city',
        'state',
        'country',
        'language',
        'address',
        'userid',
        'status',
    ];
}
