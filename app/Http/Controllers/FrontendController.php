<?php

namespace App\Http\Controllers;

use App\model\admin\Product;
use Illuminate\Http\Request;
use App\model\admin\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $main_slide = Product::where('main_slider', 1)->where('status', 1)->orderBy('id', 'desc')->first();
        $featured = Product::where('status', 1)->orderBy('id', 'desc')->limit(24)->get();
        $trends = Product::where('trend', 1)->where('status', 1)->orderBy('id', 'desc')->limit(24)->get();
        $best_rated = Product::where('best_rated', 1)->where('status', 1)->orderBy('id', 'desc')->limit(24)->get();
        $hot_deal = Product::where('hot_deal', 1)->where('status', 1)->orderBy('id', 'desc')->limit(4)->get();
        $category = Category::all();
        $mid_slider = Product::where('mid_slider', 1)->where('status', 1)->orderBy('id', 'desc')->limit(4)->get();
        return view('frontend.pages.index',compact('main_slide','featured','trends','best_rated','hot_deal','category','mid_slider'));
    }

}

