@extends('layouts.main')

@section('content')
<div class="row">
  <div class="small-6 small-centered columns">
    <h3>Shipping Info</h3>
    <form class="" action="{{route('address.store')}}" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="">Address:</label>
        <input type="text" name="address" class="form-control">
      </div>
      <div class="form-group">
        <label for="">City:</label>
        <input type="text" name="city" class="form-control">
      </div>
      <div class="form-group">
        <label for="">State:</label>
        <input type="text" name="state" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Zip</label>
        <input type="text" name="zip" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Country:</label>
        <input type="text" name="country" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Phone</label>
        <input type="text" name="phone" class="form-control">
      </div>
      <input type="submit" name="" class="button success" value="Procide to Paym">
      @include('error.error')
    </form>
  </div>

</div>


@endsection
