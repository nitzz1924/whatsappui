<?php

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
        'status',
    ];
}
