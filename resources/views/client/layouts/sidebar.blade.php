<div class="col-md-3 col-sm-4 col-xs-12">
    <div class="sidebar sidebar-left">
        <div id="sv_category_fillter-2" class="sidebar-widget widget widget_sv_category_fillter">
            <h3 class="widget-title">DogCategories</h3>
            @foreach($dogCategories as $dogcat)
            <ul class="list-none list-attr">
                <li><a data-cat="airedale-terrier" href="{{route('home.dog',$dogcat->id) }}" class="load-shop-ajax ">{{$dogcat->name}}<span class="count"></span></a></li>
            </ul>
             @endforeach
             <h3 class="widget-title">ProductCategories</h3>
              @foreach($productCategories as $dogcat)
            <ul class="list-none list-attr">
                <li><a data-cat="airedale-terrier" href="{{route('home.product',$dogcat->id) }}" class="load-shop-ajax ">{{$dogcat->name}}<span class="count"></span></a></li>
            </ul>
             @endforeach
        </div> 
        <div id="woocommerce_price_filter-2" class="sidebar-widget widget woocommerce s7upf_widget_price_filter">
            <h3 class="widget-title">Price</h3>
            <form method="get" action="http://7uptheme.com/wordpress/haustiere/product-category/golden-retriever/">
                <div class="range-filter">
                    <div class="price-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-symbol="$">


                        <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"><span class="min-price">$122</span></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"><span class="max-price">$1450</span></span>
                    </div>
                    <div class="price-amount">
                        <input type="hidden" name="min_price" value="122" data-min="122">
                        <input type="hidden" name="max_price" value="1450" data-max="1450">
                        <button type="submit" class="button">Filter</button>

                    </div>
                </div>
            </form>
        </div>
      
        <div id="s7upf_attribute_filter-3" class="sidebar-widget widget widget_s7upf_attribute_filter">
            <h3 class="widget-title">Manufacturer</h3>
            <ul class="list-none list-attr">
                  @foreach($dogCategories as $dogcat)
                <li class="africa-inline">
                    <a data-attribute="manufacturer" data-term="africa" class="load-shop-ajax  bgcolor-africa" href="index2f1a.html?filter_manufacturer=africa">
                        {{$dogcat->origin}}
                        <span class="count">2</span>
                    </a>
                </li>
              @endforeach
            </ul>
        </div>
        <div id="woocommerce_product_tag_cloud-2" class="sidebar-widget widget woocommerce widget_product_tag_cloud">
            <h3 class="widget-title">Tags</h3>
            <div class="tagcloud"><a href="../../product-tag/cat/index.html" class="tag-cloud-link tag-link-44 tag-link-position-1" style="font-size: 8pt;" aria-label="cat (1 product)">cat</a>
                <a href="../../product-tag/chicken/index.html" class="tag-cloud-link tag-link-49 tag-link-position-2" style="font-size: 8pt;" aria-label="chicken (1 product)">chicken</a>
                <a href="../../product-tag/duck/index.html" class="tag-cloud-link tag-link-48 tag-link-position-3" style="font-size: 8pt;" aria-label="duck (1 product)">duck</a>
                <a href="../../product-tag/food/index.html" class="tag-cloud-link tag-link-45 tag-link-position-4" style="font-size: 8pt;" aria-label="food (1 product)">food</a>
                <a href="../../product-tag/hourse/index.html" class="tag-cloud-link tag-link-47 tag-link-position-5" style="font-size: 8pt;" aria-label="hourse (1 product)">hourse</a>
                <a href="../../product-tag/pet/index.html" class="tag-cloud-link tag-link-46 tag-link-position-6" style="font-size: 8pt;" aria-label="pet (1 product)">pet</a></div>
        </div>
        <div id="woocommerce_product_search-2" class="sidebar-widget widget woocommerce widget_product_search">
            <h3 class="widget-title">Search</h3>
            <form role="search" method="get" class="woocommerce-product-search" action="http://7uptheme.com/wordpress/haustiere/">
                <label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>
                <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Search products…" value="" name="s">
                <button type="submit" value="Search">Search</button>
                <input type="hidden" name="post_type" value="product">
            </form>
        </div>
    </div>
</div>