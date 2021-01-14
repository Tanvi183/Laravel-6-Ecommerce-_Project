<?php

namespace App\model\Frontend;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'payment_id',
        'payment_type',
        'payment_amount',
        'blnc_transection',
        'strip_order_id',
        'subtotal',
        'shipping',
        'vat',
        'total',
        'status',
        'return_order',
        'status_code',
        'month',
        'date',
        'year'
    ];
}
