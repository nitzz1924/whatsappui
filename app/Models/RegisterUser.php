<?php
#{{--“मंज़िल उन्हीं को मिलती है जिनके सपनों में जान होती है, पंख से कुछ नहीं होता हौसलों से उड़ान होती है।”--}}
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
class RegisterUser  extends Authenticatable
{
    use Notifiable;
    protected $table = 'register_users';
    protected $fillable = [
        'userid',
        'password',
        'mobilenumber',
        'email',
        'expiredate',
        'createddate',
        'accountstatus',
        'verifystatus',
    ];
}
