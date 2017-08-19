@extends('layouts.main')

@section('content')
<div class="row">
    <div class="small-6 small-centered columns">
    <form action="{{route('payment.store')}}" method="POST" id="payment-form">
        {{csrf_field()}}
  <!-- <label>
    <input name="cardholder-name" class="field is-empty" placeholder="Jane Doe" />
    <span><span>Name</span></span>
  </label>
  <label>
    <input class="field is-empty" type="tel" placeholder="(123) 456-7890" />
    <span><span>Phone number</span></span>
  </label> -->
  <label>
    <div id="card-element" class="field is-empty"></div>
    <span><span>Credit or debit card</span></span>
  </label>
  <button type="submit" class="btn btn-success">Paying</button>
  <div class="outcome">
    <div class="error" role="alert"></div>
    <!-- <div class="success">
      Success! Your Stripe token is <span class="token"></span>
    </div> -->
  </div>
</form>
    </div>
</div>
@endsection
