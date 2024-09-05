<?php
#{{--“मंज़िल उन्हीं को मिलती है जिनके सपनों में जान होती है, पंख से कुछ नहीं होता हौसलों से उड़ान होती है।”--}}
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterUser extends Model
{
    protected $fillable = [
        'userid',
        'password',
        'mobilenumber',
        'email',
        'expiredate',
        'createddate',
        'accountstatus',
    ];
}
