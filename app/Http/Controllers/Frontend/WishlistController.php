<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class WishlistController extends Controller
{
    public function AddWishlist($id)
    {

    	$userid=Auth::id();
    	$check=DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

    	$data = array(
    		'user_id' => $userid, 
    		'product_id'=>$id 
    	);

    	if (Auth::check()) {
    		if ($check) {
    			// return \Response::json(['error' => 'Product Already has on your wishlist']);        
                return response()->json(['error' => 'Product Already has on your wishlist']);       
    		}else{
    			DB::table('wishlists')->insert($data);
             //   return \Response::json(['success' => 'Successfully Added on your wishlist']); 
             return response()->json(['success' => 'Successfully Added on your wishlist']);   		
    		}
    	}else{
    		//return \Response::json(['error' => 'At first login your account']);
              return response()->json(['error' => 'At first login your account']);        
    	}

    }

    // public function addWishlist($id)
    // {
    //     $userid = Auth::id();
    //     $check = DB::table('wishlists')->where('user_id',$userid)
    //             ->where('product_id',$id)->first();
    //     $data = array(
    //         'user_id' => $userid, 
    //         'product_id'=> $id
    //     );

    //     if (Auth::check()){
    //         if ($check) {
    //             $notification=array(
    //                 'messege'=>'Already Has your Wishlist',
    //                 'alert-type'=>'error'
    //                 );
    //             return redirect()->back()->with($notification);    
    //         }else{
    //             DB::table('wishlists')->insert($data);
    //             $notification=array(
    //                 'messege'=>'Add to Wishlist',
    //                 'alert-type'=>'success'
    //                 );
    //             return redirect()->back()->with($notification);  
    //         }
    		
    // 	}else{
    // 		$notification=array(
    //             'messege'=>'At First Login Your Account',
    //             'alert-type'=>'warning'
    //         );
    //         return redirect()->back()->with($notification);
    // 	}
    // }

}
