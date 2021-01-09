<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//==================================== Customer Route Here  ==================================================//
//===========================================================================================================//
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');
                //======== Sociallite Login Route Here  ===========//
Route::get('/auth/redirect/{provider}', 'Auth\GoogleController@redirect');
Route::get('/callback/{provider}', 'Auth\GoogleController@callback');

//==================================== Admin Route Here ===================================================//
//========================================================================================================//
Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('admin', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\Auth\LoginController@login');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
        // Password Reset Routes ======
Route::get('admin/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\Auth\ResetPasswordController@reset')->name('admin.reset.update');

//==================================== Admin Deshboard Route section ==========================================//
//============================================================================================================//
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
        //Categories =======
Route::resource('category', 'Category\CategoryController');
        // Sub_Categories =======
Route::resource('subcategory', 'Subcategory\SubCategoryController');
        //Brands =======
Route::resource('brand', 'Brand\BrandController');
        // Coupon =======
Route::resource('coupon', 'Coupon\CouponController');
        // Newslatters =======
Route::resource('newslatter', 'Newslatter\NewslatterController');
        // Product =======
Route::resource('product', 'Product\ProductController');
        // Get subcategory by ajax ...
Route::get('product/subcategory/get', 'product\productController@subCategoryGet')->name('product.sub.get');
        // Product Active ....
Route::get('product/Active/{id}', 'Product\ProductController@active')->name('product.active');
        // Product Inactive ....
Route::get('product/inctive/{id}', 'Product\ProductController@inactive')->name('product.inactive');
        // PostCategory =======
Route::resource('postCategory', 'Blog\CategoryController');
        // BlogPost =======
Route::resource('blogPost', 'Blog\PostController');
        // BlogPost Active ....
Route::get('blogPost/Active/{id}', 'Blog\PostController@active')->name('blogPost.active');
        // BlogPost Inactive ....
Route::get('blogPost/inctive/{id}', 'Blog\PostController@inctive')->name('blogPost.inctive');

});


//==================================== Frontend All Route Here ===================================================//
//===============================================================================================================//
        // Frontend =======
Route::get('/','FrontendController@index');
        // Newsletter =======
Route::post('newsletter', 'Frontend\NewsletterController@store')->name('store.newsletter');
        // Wishlist
Route::get('/wishlist', 'Frontend\wishlistController@wishlist')->name('customer.wishlist');
Route::get('show/wishlist/list', 'Frontend\WishlistController@showWishlist')->name('user.wishlist');

//============================= Add To Cart Route Here  =====================================//

Route::get('add/to/card/{id}', 'Frontend\AddCartController@addtoCart'); //Ajax
Route::post('add/cart/product', 'Frontend\AddCartController@addCart')->name('add.to.cart'); //Page Load
Route::get('show/cart', 'Frontend\AddCartController@showCart')->name('cart.product.list'); //show Cart
Route::get('/cart/product/remove/{rowId}', 'Frontend\AddCartController@removeCart')->name('cart.product.remove'); //Remove Cart
Route::post('/cart/product/update/{id}', 'Frontend\AddCartController@updateCart')->name('cart.product.update');
Route::post('insert/prodcut/cart', 'Frontend\AddCartController@insertCart')->name('product.cart.insert');
        //checkout
Route::get('user/cheack/out', 'Frontend\AddCartController@checkOut')->name('user.checkout');
        //Apply Coupon
Route::post('user/apply/coupon', 'Frontend\AddCartController@coupon')->name('apply.coupon');
Route::get('user/remove/coupon', 'Frontend\AddCartController@couponRemove')->name('user.coupons.remove');


        //product Details
Route::get('product/details/{product_code}/{product_name}','Frontend\ProductController@productDetails');
Route::get('cart/product/view/{id}','Frontend\ProductController@productView');    //Product view
