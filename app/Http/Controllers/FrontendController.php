<?php

namespace App\Http\Controllers;

use App\model\admin\Brand;
use App\model\admin\Product;
use Illuminate\Http\Request;
use App\model\admin\Category;
use App\model\Frontend\Comment;
use App\model\Frontend\Order;
use phpDocumentor\Reflection\Types\Null_;

class FrontendController extends Controller
{
    public function index()
    {
        // Banner Product..
        $main_slide         = Product::where('main_slider', 1)->where('status', 1)->orderBy('id', 'desc')->first();
        // Fetured Product..
        $featured           = Product::where('status', 1)->orderBy('id', 'desc')->limit(24)->get();
        // Trendy Product..
        $trends             = Product::where('trend', 1)->where('status', 1)->orderBy('id', 'desc')->limit(24)->get();
        // Best Rated Product..
        $best_rated         = Product::where('best_rated', 1)->where('status', 1)->orderBy('id', 'desc')->limit(24)->get();
        // Hot deal Product..
        $hot_deal           = Product::where('hot_deal', 1)->where('status', 1)->orderBy('id', 'desc')->limit(4)->get();
        // Popular Categories.. 
        $category           = Category::all();
        //Mid Slider
        $mid_slider         = Product::where('mid_slider', 1)->where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        //Discont product
        $discout_product    = Product::where('status', 1)->whereNotNull('discount_price')->orderBy('id', 'DESC')->first();
        // Electronict category Product.. 
        $elec_cat = Category::skip(5)->first();
        $elec_id = $elec_cat->id;
        $electronic = Product::where('category_id', $elec_id)->where('status', 1)->orderBy('id', 'desc')->get();
        // man category Product.. 
        $mans_pa = Category::skip(0)->first();
        $mans_id = $mans_pa->id;
        $mans_passion = Product::where('category_id', $mans_id)->where('status', 1)->orderBy('id', 'desc')->get();
        // woman category Product.. 
        $womans_pa = Category::skip(1)->first();
        $womans_id = $womans_pa->id;
        $womans_passion = Product::where('category_id', $womans_id)->where('status', 1)->orderBy('id', 'desc')->get();
        // Brand Logo Show
        $brandlogo = Brand::all();
        // Hot new Product.. 
        $hot_new = Product::where('hot_new', 1)->where('status', 1)->orderBy('id', 'DESC')->take(3)->get();
        //Bye One Get One
        $ByeGet         = Product::where('bye_one_get_one', 1)->where('status', 1)->orderBy('id', 'desc')->limit(24)->get();
        // Random products
        $random_products = Product::where('status', 1)->inRandomOrder()->limit(10)->get();
        // Review Product
        $reviewProduct = Comment::where('status', 1)->orderBy('id', 'desc')->limit(6)->get();
        
        return view('frontend.pages.index',compact('main_slide', 'hot_deal', 'featured', 'trends', 'best_rated',
            'category', 'mid_slider', 'discout_product', 'electronic', 'mans_passion', 'womans_passion', 'brandlogo', 'ByeGet',
            'random_products', 'hot_new', 'reviewProduct'
        ));
    }

    public function trakOrder(Request $request)
    {
        $code = $request->status_code;

        $check = Order::where('status_code', $code)->first();

        if ($check) {
            return view('frontend.pages.order.track_order', compact('check'));
        }else{
            // Notification
            $notification=array(
                'messege'=>'Your Order Code Invalid !',
                'alert-type'=>'error'
            );
            // Redirect
            return redirect()->back()->with($notification);
        }

    }

}
