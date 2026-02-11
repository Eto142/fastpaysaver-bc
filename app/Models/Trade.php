<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'asset_symbol',
        'asset_name',
        'type',
        'order_type',
        'amount_usd',
        'quantity',
        'limit_price',
    ];
}
