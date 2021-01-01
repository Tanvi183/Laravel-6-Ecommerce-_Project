<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\model\admin\Product;
use Illuminate\Http\Request;
use Cart;

class ProductController extends Controller
{
    public function productDetails($product_code,$product_name)
    {
        $product = Product::Where('status', 1)->where('product_code', $product_code)->first();
       
        $color=$product->product_colour;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',' , $size);
        
       return view('frontend.pages.product_details', compact('product', 'product_color', 'product_size'));
    }
    public function addCart(Request $request)
    {
        $product = Product::findorfail($request->product_id);
        // Card Add
        $data                     = array();
        if ($product->discount_price == null) {
            $data['id']               = $product->id;
            $data['name']             = $product->product_name;
            $data['qty']              = $request->qty;
            $data['price']            = $product->selling_price;
            $data['weight']           = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size']  = $request->size;
            Cart::add($data);

            $notification=array(
                'messege'=>'Add To Cart Successfully.!',
                'alert-type'=>'success'
            );
            return Redirect()->to('/')->with($notification);
        } else {
            $data['id']               = $product->id;
            $data['name']             = $product->product_name;
            $data['qty']              = $request->qty;
            $data['price']            = $product->discount_price;
            $data['weight']           = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size']  = $request->size;
            Cart::add($data);

            $notification=array(
                'messege'=>'Add To Cart Successfully.!',
                'alert-type'=>'success'
            );
            return Redirect()->to('/')->with($notification);
        }
                    
    }
}
