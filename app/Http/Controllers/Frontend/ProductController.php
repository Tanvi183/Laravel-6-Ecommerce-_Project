<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\model\admin\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productDetails($product_code,$product_name)
    {
       $product = Product::Where('status', 1)->where('product_code', $product_code)->first();
       return view('frontend/pages/product_details', compact('product'));
    }
}
