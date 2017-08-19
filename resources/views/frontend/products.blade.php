@extends('layouts.main')
@section('title','Products')
@section('content')
<div class="row">
  @forelse($products as $product)
  <div class="small-3 medium-3 large-3 columns">
      <div class="item-wrapper">
          <div class="img-wrapper">
              <a href="{{route('cart.addItem',$product->id)}}" class="button expanded add-to-cart">
                  Add to Cart
              </a>
              <a href="#">
                  <img src="{{url('img',$product->img)}}"/>
              </a>
          </div>
          <a href="{{route('product')}}">
              <h3>
                  {{$product->name}}
              </h3>
          </a>
          <h5>
              Cena: {{$product->price}} din.
          </h5>
          <p>
            {{$product->desc}}
          </p>
      </div>
  </div>
  @empty
  <h3>There is no product</h3>
  @endforelse
        </div>
@endsection
