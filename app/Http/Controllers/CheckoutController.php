<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;

class CheckoutController extends Controller
{
    // public function step1()
    // {
    //   if (auth()->check()) {
    //     return redirect()->route('checkout.shipping');
    //   }
    //   return redirect('login');
    // }
    public function shipping()
    {
      return view('frontend.shippingInfo');
    }
    public function payment()
    {
      return view('frontend.payment');
    }
    public function storePayment(Request $request)
    {
      // Set your secret key: remember to change this to your live secret key in production
      // See your keys here: https://dashboard.stripe.com/account/apikeys
      \Stripe\Stripe::setApiKey("sk_test_Fdiue48xLZgtU4yMYh8qeJt4");

      // Token is created using Stripe.js or Checkout!
      // Get the payment token ID submitted by the form:
      // $token = $_POST['stripeToken'];
         $token = $request->stripeToken;

      // Charge the user's card:
      $charge = \Stripe\Charge::create(array(
        "amount" => Cart::subtotal()*100,
        "currency" => "usd",
        "description" => "Example charge",
        "source" => $token,
        ));

        Order::createOrder();
        return "Order complited";
    }

}
