@extends('layouts.main')

@section('content')
<div class="row">
  <h3>Cart items</h3>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>amount</th>
        <th>Size</th>
        <th></th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cartitems as $cartitem)
      <tr>
        <td>{{$cartitem->name}}</td>
        <td>{{$cartitem->price}}</td>
  {!! Form::open(['route'=>['cart.update',$cartitem->rowId],'method'=>'PUT','class'=>'form-inline']) !!}
        <td width="300px">
              <div class="form-group col-xs-4">
                <input type="text" name="qty" value="{{$cartitem->qty}}"  class="">
              </div>
        </td>
        <td>
          {!! Form::select('size',['small'=>'Small','medium'=>'Medium','large'=>'Large'] , $cartitem->options->has('size')?$cartitem->options->size:'') !!}
        </td>
        <td>
          <div class="form-inline">
          <input type="submit" class="btn btn-sm btn-default" value="Ok">
          </div>  {!! Form::close() !!}
        </td>
        <td>
            <form class="form-inline" action="{{route('cart.destroy',$cartitem->rowId)}}" method="POST">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
              <input class="button" type="submit" name="" value="Delete">
            </form>
        </td>
      </tr>
      @endforeach
      <tr>
        <td></td>
        <td>
          <!-- PDV: {{Cart::tax()}}
          <br> -->
          Ukupno kosta: {{Cart::subtotal()}}</td>
        <td>Proizvoda ima: {{Cart::count()}}</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
<div class="col-xs-6">
  <a href="{{route('checkout.shipping')}}" type="button" class="button btn btn-primary">Checkout</a>
</div>


</div>

@endsection
