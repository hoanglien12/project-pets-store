@extends('client.layouts.master')
@section('title','Dogs')
@section('content')
    @include('client.layouts.sidebar')
    <div class="main-wrap-shop content-wrap content-sidebar-left col-md-9 col-sm-8 col-xs-12">

    <div class="title-page clearfix">
        <h2 class="title30 font-bold dosis-font text-uppercase pull-left">Golden Retriever</h2>
        <ul class="sort-pagi-bar list-inline-block pull-right">
            <li>
                <div class="sort-by">
                    <span class="gray">Sort:</span>
                    <div class="select-box inline-block">
                        <form class="woocommerce-ordering" method="get">
                            <select name="orderby" class="orderby">
                                <option value="menu_order">Default sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                            <input type="hidden" name="paged" value="1">
                        </form>
                    </div>
                </div> 
            </li>
            <li>
                <div class="dropdown-box show-by">
                    <a href="#" class="dropdown-link"><span class="gray">Per Page:</span><span class="silver number">12</span></a>
                    <ul class="dropdown-list list-none">
                        <li><a data-number="9" class="load-shop-ajax" href="indexdf48.html?number=9">9</a></li>
                        <li><a data-number="12" class="load-shop-ajax" href="indexcae9.html?number=12">12</a></li>
                        <li><a data-number="18" class="load-shop-ajax" href="index151b.html?number=18">18</a></li>
                        <li><a data-number="24" class="load-shop-ajax" href="indexf213.html?number=24">24</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="view-type">
                    <span class="gray">View As:</span>
                    <a data-type="grid" href="indexcc26.html?type=grid" class="grid-view load-shop-ajax active"><i class="fa fa-th-large"></i></a>
                    <a data-type="list" href="indexbf35.html?type=list" class="list-view load-shop-ajax "><i class="fa fa-reorder"></i></a>
                </div>
            </li>
        </ul>
    </div>
    <div class="product-grid-view   products-wrap js-content-wrap" data-load="{&quot;attr&quot;:{&quot;item_style&quot;:null,&quot;item_style_list&quot;:null,&quot;column&quot;:&quot;3&quot;,&quot;size&quot;:null,&quot;size_list&quot;:null,&quot;shop_style&quot;:null,&quot;animation&quot;:&quot;zoom-thumb&quot;,&quot;number&quot;:&quot;12&quot;,&quot;cats&quot;:&quot;golden-retriever&quot;}}">
        <div class="products row list-product-wrap js-content-main">
             @foreach($dog_id as $dog_id) 
            <div class="list-col-item list-3-item post-724 product type-product status-publish has-post-thumbnail product_cat-bichon-frise product_cat-french-bulldog product_cat-golden-retriever first instock sale featured shipping-taxable purchasable product-type-simple">
                <div class="item-product item-product-grid">
                    <div class="product-thumb">
                        <!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
                        <a href="{{ route('home.detail_product',$dog_id->id)}} " class="product-thumb-link zoom-thumb">
                        <img width="270" height="270" src="{{asset('asset/uploads/2018/img/'.$dog_id->photos)}}" class="attachment-270x270 size-270x270 wp-post-image" alt="" sizes="(max-width: 270px) 100vw, 270px"></a>
                        @if($dog_id->sale!=0)
                        <div class="product-label"><span class="sale">-{{$dog_id->sale}}%</span></div>
                        @endif
                        <div class="product-extra-link text-center">
                            <ul class="list-product-extra-link list-inline-block">
                                <li><a href="index7bbe.html?add_to_wishlist=724" class="add_to_wishlist wishlist-link" rel="nofollow" data-product-id="724" data-product-title="Bailey"><i class="icon ion-android-favorite-outline" aria-hidden="true"></i><span>Wishlist</span></a></li>
                                <li><a title="Quick View" data-product-id="724" href="../../product/bailey/index.html" class="product-quick-view quickview-link "><i class="icon ion-search"></i><span>Quick view</span></a></li>
                                <li><a href="index7b5d.html?action=yith-woocompare-add-product&amp;id=724" class="product-compare compare compare-link" data-product_id="724"><i aria-hidden="true" class="icon ion-android-sync"></i><span>Compare</span></a></li>
                            </ul>
                            <a href="" rel="nofollow" data-product_id="724" data-product_sku="DSP23684" data-quantity="1" class="button addcart-link shop-button bg-color product_type_simple add_to_cart_button s7upf_ajax_add_to_cart product_type_simple" data-title="Bailey"><span>Add to cart</span></a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="title12 text-uppercase color font-bold">ID:DSP{{$dog_id->id}}</span>
                        <h3 class="title18 text-uppercase product-title dosis-font font-bold">
                            <a title="Bailey" href="../../product/bailey/index.html" class="black">Name: {{$dog_id->name}}</a>
                        </h3>
                        @if($dog_id->promotion_price==0)
                        <div class="product-price simple"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$dog_id->price}}</span></div>
                        @else
                         <div class="product-price simple"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$dog_id->price}}</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$dog_id->promotion_price}}</span></ins></div>
                         @endif
                        <ul class="wrap-rating list-inline-block">
                            <li>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:80%"></div>
                                </div>
                            </li>
                            <li>
                                <span class="number-rate silver">(1s)</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</div>
</div>
</div>
@endsection