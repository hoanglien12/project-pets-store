@extends('client.layouts.master')
@section('title','Product Categories')
@section('content')
<h1>Product categories</h1>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					@foreach($productCategories as $cate)
					<div class="beta-products-list">
						<a href="{{ route('home.product',$cate->id) }}"><h4>{{ $cate->name }}</h4></a>
						<div class="row">
							@foreach($cate->product as $product)
							<div class="col-sm-3">
								<div class="single-item">
									<div class="single-item-header">
										@php
											$photos = $product->getImage($product->id);
										@endphp
										<a href=""><img src="{{ asset('upload/product/' . $photos[0]) }}" height="230px" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$product->name}}</p>
										<p class="single-item-price">
											
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href=""><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endforeach

					<div class="space50">&nbsp;</div>
				</div>
			</div> <!-- end section with sidebar and main content -->
		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div>
@endsection