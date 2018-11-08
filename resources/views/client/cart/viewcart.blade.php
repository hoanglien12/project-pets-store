@extends('client.layouts.master')
@section('title','Dogs')
@section('content')


<article style="background: white" 
id="post-1084" class="post-1084 page type-page status-publish hentry"><div
class="entry-content clearfix">
<div class="title-page clearfix"><h1 class="title30 dosis-font font-bold text-uppercase">Cart</h1></div>
<div class="clearfix"><div class="woocommerce"><form
class="woocommerce-cart-form" action="{{route('home.viewcart')}}" method="post">
<table
class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0"><thead><tr>
	<th style="width: 50px" class="product-remove">&nbsp;</th>
	<th style="width: 100px" class="product-thumbnail">&nbsp;</th>
	<th style="width: 200px" class="product-name">Product</th> 
	<th style="width: 250px" class="product-price">Price</th>
	<th style="width: 200px" class="product-quantity">Quantity</th>
	<th style="width: 250px" class="product-subtotal">Total</th></tr></thead>
	@if(Session::has('cart'))
@foreach($dog_add as $dog_add)
<tbody>
<tr class="woocommerce-cart-form__cart-item cart_item">

<td class="product-remove"><a
href="{{route('home.del',$dog_add['item']['id'])}}" class="remove" aria-label="Remove this item" data-product_id="724" data-product_sku="DSP23684">&times;</a></td>
<td class="product-thumbnail"> <a href="">
<img width="100px" height="100px" src="" /></a></td>
<td class="product-name" data-title="Product"><a
href="">{{$dog_add['item']['name']}}</a></td><td
class="product-price" data-title="Price">
<span
class="woocommerce-Price-amount amount"><span
class="woocommerce-Price-currencySymbol">&#36;</span>@if ($dog_add['item']['sale']==0) {{$dog_add['item']['price']}} @else {{$dog_add['item']['sale']}} @endif </span></td><td
class="product-quantity" data-title="Quantity">	<label
class="qty-label">Qty:</label><div
class="detail-qty info-qty border radius6">
<a
href="{{route('home.del',$dog_add['item']['id'])}}" class="qty-down"><i
class="fa fa-angle-down" aria-hidden="true"></i></a>
<input
type="text" step="1" min="0" max="" name="" value="{{$dog_add['qty']}}" title="Qty" class="input-text text qty qty-val" size="4" disabled />
<a
href="{{route('home.cart',$dog_add['item']['id'])}}" class="qty-up"><i
class="fa fa-angle-up" aria-hidden="true"></i></a></div></td><td
class="product-subtotal" data-title="Total">
<span
class="woocommerce-Price-amount amount"><span
class="woocommerce-Price-currencySymbol">&#36;</span>{{$dog_add['price']}}</span></td></tr><tr><td
colspan="6" class="actions">
@endforeach
@endif
<strong>Total: @if(Session::has('cart')){{number_format($totalPrice)}} @else 0.00 @endif</strong></br>

<input
type="hidden" id="_wpnonce" name="_wpnonce" value="e210a99684" /><input
type="hidden" name="_wp_http_referer" value="/wordpress/haustiere/cart/" /></td></tr></tbody></table></form>
<div  class="wc-proceed-to-checkout">
<a href="{{route('home.checkout')}}" class="checkout-button button alt wc-forward">
Proceed to checkout</a></div></div></div></div>
</article>
@endsection