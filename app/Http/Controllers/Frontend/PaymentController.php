<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Payment page..
    public function index()
    {
        $cart = Cart::content();
        return view('frontend.pages.payment.payment_form', compact('cart'));
    }

    //Payment process
    public function process(Request $request)
    {
        //Validation
        $validation = $request->validate([
            'name'          => 'required',
            'email'         => 'required',
            'phone_number'  => 'required',
            'address'       => 'required',
            'city'          => 'required',
            'post_code'     => 'required',
            'payment'       => 'required',
        ]);

        $payment                 = array();
        $payment['name']         = $request->name;
        $payment['email']        = $request->email;
        $payment['phone_number'] = $request->phone_number;
        $payment['address']      = $request->address;
        $payment['city']         = $request->city;
        $payment['post_code']    = $request->post_code;
        $payment['payment']      = $request->payment;

        //Payment condition
        if ($request->payment == 'stripe') {
            $cartList = Cart::content();
            // dd('master Card Payment');
            return view('frontend.pages.payment.stripe_payment', compact('cartList'));
        }elseif($request->payment == 'paypal'){
            dd('Paypal Payment');
        }elseif($request->payment == 'ideal'){
            dd('Idel Payment');
        }else{
            dd('Checking');
        }

    }

    // Stripe Payment
    public function stripe(Request $request)
    {
        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51I8oIQKVek47RdpXfy1ZspwZDaCBDm4cKWxHNFBb2qOHNjuJEpTSsqwLwDJe2jsCJ7QlRMPWmugyNYQk2lkiqP1d00OqY8OcUW');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => 999 * 100,
            'currency' => 'usd',
            'description' => 'One Tech Details',
            'source' => $token,
            'statement_descriptor' => 'Custom descriptor',
        ]);
        return response()->json($charge);
    }


}
