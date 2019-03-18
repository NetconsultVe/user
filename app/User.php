<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tele_ppal',
        'dir',
        'username',
        'remember_token',
        'active',
        'verified',
        'email_verified_at',
        'cod_ubch',
        'cod_mp',
        'cod_pq',
        'cod_comun',
        'cod_manzana',
        'cod_familia',
        'id_nivel',
        'avatar',
        'email_token',
        'sms_token',
        'valid_sms'
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

        /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
