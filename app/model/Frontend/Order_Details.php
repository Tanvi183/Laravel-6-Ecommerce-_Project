<?php

namespace App\model\Frontend;

use Illuminate\Database\Eloquent\Model;

class Order_Details extends Model
{
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'product_name',
        'color',
        'size',
        'qty',
        'single_price',
        'total_price',
    ];
}
