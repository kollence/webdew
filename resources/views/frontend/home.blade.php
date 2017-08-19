@extends('layouts.main')
@section('content')
<section class="hero text-center">
    <br/>
    <br/>
    <br/>
    <br/>
    <h2 >
        <strong>
            Dobrodosli u nasu Online Prodavnicu
        </strong>
    </h2>
    <br>
    <a href="{{url('products')}}"><button class="button large">Trenutno u ponudi</button></a>
</section>
<br/>
<div class="subheader text-center">
     <h2>
    Prosetajte kroz prodavnicu
</h2>
</div>

<!-- Latest SHirts -->
<div class="row">
    @forelse($products->chunk(4) as $chunk)
    @foreach($chunk as $product)
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
    @endforeach
    @empty
    <h3>There is no product</h3>
    @endforelse
</div>
<!-- Footer -->
<br>
@endsection
