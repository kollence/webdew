<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use App\User;

class Order extends Model
{
    protected $fillable=['total','delivered'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
      return $this->belongsToMany(Product::class)->withPivot('qty','total')->withTimestamps();
    }
    public static function createOrder()
    {
      //Create Order
      $user=auth()->user();
      $order=$user->orders()->create(['total'=>Cart::total(),
                                      'delivered'=>0
                                     ]);
      $cartitems=Cart::content();
      foreach ($cartitems as $cartItem) {
        $order->orderItems()->attach($cartItem->id,['qty'=>$cartItem->qty,
                                                    'total'=>$cartItem->qty*$cartItem->price
                                                   ]);
      }
    }
    public function scopeOrder($query,$type='')
    {
      if ($type=='') {
        return $query->orderBy('delivered')->get();
      }elseif ($type=='pending') {
         return $query->where('delivered',0)->get();
      }elseif ($type=='delivered') {
        return $query->where('delivered',1)->get();
      }else{
        return "<h3>Nothing to be seen</h3>";
      }
    }


}
