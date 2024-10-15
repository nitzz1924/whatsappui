<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
        'userid',
        'name',
        'components',
        'language',
        'status',
        'category',
        'sub_category',
        'templateid',
    ];
}
