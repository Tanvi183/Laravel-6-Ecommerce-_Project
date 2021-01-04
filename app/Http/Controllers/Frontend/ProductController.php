<?php

namespace App\Http\Controllers\Frontend;

use App\model\admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
// use Cart;
use Response;

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

    public function productView($id)
    {
        $product    = Product::where('id', $id)->where('status', 1)->first();
        $cat = $product->category;
        $subcat = $product->subcategory;
        $bnd = $product->brand;

        // $product = DB::table('products')
        //     ->join('categories', 'products.category_id', 'categories.id')
        //     ->join('sub__categories', 'products.subcategory_id', 'sub__categories.id')
        //     ->join('brands', 'products.brand_id', 'brands.id')
        //     ->select('products.*', 'categories.category_name', 'sub__categories.subcategory_name', 'brands.brand_name')
        //     ->where('products.id', $id)->where('status', 1)->first();

        $color = explode(',', $product->product_colour);
        $size  = explode(',', $product->product_size);

        // return response()->json($product);

        return response()->json(array(
                'product' => $product,
                'cat'     => $cat,
                'subcat'     => $subcat,
                'bnd'     => $bnd,
                'color'   => $color,
                'size'    => $size,
            ));
    }

}
