@extends('admin.layout.admin')

@section('content')

<h2>Orders</h2>


  @foreach($orders as $order)
<div class="panel panel-info">
    <table class="table table-bordered">
      <div class="panel-heading">
        <tr>
          <th>Article</th>
          <th>qty</th>
          <th>Price</th>
        </tr>

          @foreach($order->orderItems as $item)
          <tr>
              <td>{{$item->name}}</td>
              <td>{{$item->pivot->qty}}</td>
              <td>{{$item->pivot->total}}</td>
          </tr>
          @endforeach
      </div>
  <div class="panel-body">
    <tr>
      <th>Name</th>
      <th>Total</th>
      <th>Delivered</th>
    </tr>
    <tr>
      <td>Ordered by: {{$order->user->name}}</td>
      <td>Total price: {{$order->total}}</td>
      <td>
        <form class="form-inline" action="{{route('toggle.deliver',$order->id)}}" method="post">
          {{csrf_field()}}
           <input type="checkbox" name="delivered" value="1" {{$order->delivered==1?"checked":""}}>
           <input type="submit" name="" value="Submit">
        </form>

      </td>
    </tr>
      </div>
    </table>
</div>

  @endforeach


@endsection
