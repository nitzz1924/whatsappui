<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'phonenumber',
        'modulename',
        'template',
        'segmentname',
        'userid',
        'sendimmediate',
        'scheduledatetime',
        'mediaimage',
    ];
}
