<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password',
        'btc_address', 'btcImage',
    'eth_address', 'ethImage',
    'usdt_address', 'usdtImage',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

