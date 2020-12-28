<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\model\admin\Product;
use Illuminate\Http\Request;
use Cart;

class AddCartController extends Controller
{
        // Add To Card By Ajax..
    public function addCart($id)
    {
        $product    = Product::where('id', $id)->where('status', 1)->first();
            // Card Add
            if ($product->discount_price == null) {
                $data                     = array();
                $data['id']               = $product->id;
                $data['name']             = $product->product_name;
                $data['qty']              = 1;
                $data['price']            = $product->selling_price;
                $data['weight']           = 1;
                $data['options']['image'] = $product->image_one;
                $data['options']['color'] = "";
                $data['options']['size'] = "";
                Cart::add($data);
                // json
                return response()->json(['success' => 'Cart Added Successfully']);
            } else {
                $data                     = array();
                $data['id']               = $product->id;
                $data['name']             = $product->product_name;
                $data['qty']              = 1;
                $data['price']            = $product->discount_price;
                $data['weight']           = 1;
                $data['options']['image'] = $product->image_one;
                $data['options']['size'] = "";
                $data['options']['colour'] = "";
                Cart::add($data);
                // json
                return response()->json(['success' => 'cart Added Successfully']);
            }
    }

    public function checkCart()
    {
        $content = Cart::content();
        return response()->json($content);
    }
}


