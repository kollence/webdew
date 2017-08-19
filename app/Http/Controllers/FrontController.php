<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontController extends Controller
{
    public function index()
    {
      $products=Product::all();
      return view('frontend.home', compact('products'));
    }
    public function products()
    {
      $products=Product::all();
      return view('frontend.products', compact('products'));
    }
    public function product()
    {
      return view('frontend.product');
    }
}
