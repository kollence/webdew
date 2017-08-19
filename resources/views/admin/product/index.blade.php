@extends('admin.layout.admin')

@section('content')

  <h3>Products</h3>
<ul class="list-group">
  @foreach($products as $product)
<li class="list-group-item row">
  <div class="form-group col-xs-4">
      <h4 class="form-control-static">{{$product->name}}</h4>
  </div>
  <div class="form-group col-xs-4">
      <h4 class="form-control-static">{{$product->category->name}}</h4>
  </div>
  <div class="col-xs-4">
    <form class="form-inline" action="{{route('product.destroy',$product->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
    </form>
  </div>

</li>

  @endforeach
</ul>



@endsection
