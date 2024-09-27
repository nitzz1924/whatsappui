<?php
#{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'campaignname',
        'modulename',
        'template',
        'segmentname',
        'userid',
        'sendimmediate',
        'scheduledatetime',
        'datetime',
        'mediaimage',
        'mediatype',
        'languagetype',
    ];
}
