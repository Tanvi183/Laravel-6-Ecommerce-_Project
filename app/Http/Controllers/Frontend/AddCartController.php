<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\model\admin\Product;
use Illuminate\Http\Request;
use Cart;

class AddCartController extends Controller
{
    // Add To Card By Ajax..
    public function addtoCart($id)
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

    // Add Product Cart By Route..
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

    // Show Cart Product
    public function showCart(Request $request)
    {
        $cart = Cart::content();
        return view('frontend.pages.cart', compact('cart'));   
    }

    // Remove Cart
    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        // Notification...
        $notification=array(
            'messege'=>'Cart Remove Successfully.!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification); 
    }

    public function updateCart(Request $request, $id)
    {
        $rowId = $id;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        $notification=array(
            'messege'=>'Cart Update Successfully.!',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification); 
    }

    //Inset Product Cart
    public function insertCart(Request $request)
    {
        $id = $request->product_id;
        $product    = Product::where('id', $id)->where('status', 1)->first();
        // Card Add
        if ($product->discount_price == null) {
            $data                     = array();
            $data['id']               = $product->id;
            $data['name']             = $product->product_name;
            $data['qty']              = $request->qty;
            $data['price']            = $product->selling_price;
            $data['weight']           = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size']  = $request->size;
            Cart::add($data);
            // json
            // return response()->json($data);
            $notification=array(
                'messege'=>'Add To Cart Successfully.!',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);

        } else {
            $data                      = array();
            $data['id']                = $product->id;
            $data['name']              = $product->product_name;
            $data['qty']               = $request->qty;
            $data['price']             = $product->discount_price;
            $data['weight']            = 1;
            $data['options']['image']  = $product->image_one;
            $data['options']['size']   = $request->color;
            $data['options']['colour'] = $request->size;
            Cart::add($data);
            // json
            $notification=array(
                'messege'=>'Add To Cart Successfully.!',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification); 
        }
    }

}


