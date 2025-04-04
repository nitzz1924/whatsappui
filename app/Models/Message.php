<?php
#{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'userid',
        'senderid',
        'type',
        'email',
        'message',
        'recievedid',
        'templatename',
        'campaignname',
        'imageurl',
        'messagestatus',
    ];
}
