<?php

namespace App\model\Frontend;

use App\model\admin\Product;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'user_id', 'product_id',
    ];
    public function product()
    {
         return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
