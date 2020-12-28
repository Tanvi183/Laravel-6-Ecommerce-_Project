<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Frontend\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class WishlistController extends Controller
{
    public function AddWishlist($id)
    {
    	$userid = Auth::id();
    	$check = Wishlist::where('user_id',$userid)->where('product_id',$id)->first();

    	$data = array(
    		'user_id' => $userid, 
    		'product_id'=>$id 
    	);

    	if (Auth::check()) {
    		if ($check) {       
                return response()->json(['error' => 'Product Already has on your wishlist']);       
    		}else{
    			Wishlist::add($data);
             	return response()->json(['success' => 'Successfully Added on your wishlist']);   		
    		}
    	}else{
    		return response()->json(['error' => 'At first login your account']);        
    	}

    }

}
