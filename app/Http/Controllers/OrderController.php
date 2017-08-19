<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function customerOrders($type='')
    {
      $orders = Order::order($type);
      return view('admin.orders', compact('orders'));

    }
    public function toggledeliver(Request $request, $orderID)
    {
      $order=Order::find($orderID);
      if ($request->has('delivered')) {
        $order->delivered=$request->delivered;
      }else{
        $order->delivered="0";
      }
      $order->save();
      return back();
    }
}
