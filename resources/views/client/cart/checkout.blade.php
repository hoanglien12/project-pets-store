@extends('client.layouts.master')
@section('title','Dogs')
@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/checkout.css') }}">
<script>
	function handleClick(payment) {
	    var feeship = payment.value;
	   	$("#feeship").html(feeship);
	}
</script>
<div class="section">
	<div class="container">
		<form action="" method="POST" name="myForm">
			@csrf
			<div class="row">
				<div class="col-md-7">
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">Billing address</h3>
						</div>

						<div class="form-group">
							<label for="name">Name</label>
							<input class="input" type="text" id="name" name="name" placeholder="Name">
						</div>

						<div class="form-group">
							<label for="address">Address</label>
							<input class="input" type="text" id="address" name="address" placeholder="Address">
						</div>

						<div class="form-group">
							<label for="other_address">Other address</label>
							<input class="input" type="text" id="other_address" name="other_address" placeholder="Other Address">
						</div>
						
						<div class="form-group">
							<label for="phone">Phone</label>
							<input class="input" type="text" id="phone" name="phone" placeholder="Telephone">
						</div>

						<div class="form-group">
							<label for="description">Note</label>
							<textarea class="input" name="description" placeholder="Order Notes"></textarea>
						</div>
					</div>
				</div>
				<div class="col-md-5 order-details">
					<div class="section-title text-center">
						<h3 class="title">Your Order</h3>
					</div>
					<div class="order-summary">
						<div class="order-col">
							<div><strong>PRODUCT</strong></div>
							<div><strong>30000000 VND</strong></div>
						</div>
						@if(Session::has('cart'))
	                        @foreach($dog_cart as $dog_add)
							<div class="order-products">
								<div class="order-col">

									<div>{{$dog_add['qty']}} x {{$dog_add['item']['name']}}</div>
									<div>${{number_format($dog_add['price'])}}</div>
								</div>
							</div>
							@endforeach
						@endif
						<div class="order-col">
							<div>SHIPPING</div>
							<div><strong id="feeship">15000</strong> VND</div>
						</div>
						<div class="order-col">
							<div><strong>TOTAL</strong></div>
							<div><strong class="order-total">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif VND
							</strong></div>
						</div>
					</div>
					<div class="payment-method">
						<div class="input-radio">
							<input type="radio" name="payment" onclick="handleClick(this);" id="payment-1" checked="" value="15000">
							<label for="payment-1">
								<span></span>
								Shipping
							</label>
						</div>
						<div class="input-radio">
							<input type="radio" name="payment" onclick="handleClick(this);" id="payment-2" value="20000">
							<label for="payment-2">
								<span></span>
								Cod
							</label>
						</div>
						<div class="input-radio">
							<input type="radio" name="payment"  onclick="handleClick(this);" id="payment-3" value="0">
							<label for="payment-3">
								<span></span>
								Express delivery
							</label>
						</div>
					</div>
					<button class="btn btn-primary checkout" type="submit">Order</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
