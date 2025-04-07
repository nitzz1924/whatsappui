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
    // App\Models\Message.php

    public function contact()
    {
        return $this->hasOne(\App\Models\Contact::class, 'phonenumber', 'recievedid');
    }

}
