@extends('client.layouts.master')
@section('title','Detail Blog')
@section('content')
	<div>
		<h1>Blogs</h1>
	</div>
	<div class="content-wrap content-sidebar-right col-md-9 col-sm-8 col-xs-12">
	    <div class="content-single-blog ">
	        <div class="single-post-thumb banner-advs">
	            @php
                    $photo = $blog->getImage($blog->id);
                @endphp
                @if($photo != null)
                <img width="870" height="400" src="{{ asset('upload/post/' . $photo[0]) }}" class="attachment-870x400 size-870x400 wp-post-image" alt=""> </a>
                @endif
	        </div>
	        <ul class="list-inline-block post-meta-data">
	            <li><i class="fa fa-calendar color"></i><span class="gray">{{ date('Y-m-d',strtotime($blog->created_at))}}</span></li>
	            <li><i aria-hidden="true" class="fa fa-comment color"></i>
	                <a href="index.html#respond">0
	                    Comments </a>
	            </li>
	        </ul>
	        <div class="content-post-default">
	            <h2 class="title24 font-bold">
	            	{{$blog->title}}
	            </h2>
	            <div class="detail-content-wrap clearfix">
	                <div class="vc_row wpb_row">
	                    <div class="wpb_column column_container col-sm-12">
	                        <div class="vc_column-inner ">
	                            <div class="wpb_wrapper">
	                                <div class="wpb_text_column wpb_content_element ">
	                                    <div class="wpb_wrapper">
	                                        <p class="desc">
	                                        	{{$blog->summary}}
	                                        </p>
	                                        <p class="desc">
	                                        	{!!$blog->content!!}
	                                        </p>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="clear"></div>
	    <div class="single-related-post">
	        <h2 class="title18 font-bold text-uppercase title-single-related-post">
	            YOU MIGHT ALSO LIKE
	        </h2>
	        <div class="related-post-slider">
	            <div class="wrap-item smart-slider owl-carousel owl-theme" data-item="" data-speed="" data-itemres="0:1,480:2,990:3" data-prev="" data-next="" data-pagination="" data-navigation="" style="opacity: 1; display: block;">
	                <div class="owl-wrapper-outer">
	                    <div class="owl-wrapper" style="width: 3600px; left: 0px; display: block;">
	                    	@foreach($blogs_other as $blog)
	                        <div class="owl-item active" style="width: 300px;">
	                            <div class="item-post item-post-default">
	                                <div class="post-thumb banner-advs zoom-image fly-hoz">
	                                    <a href="{{ route('home.detail_blog',$blog->id) }}">
	                                    	@php
		                                        $photo = $blog->getImage($blog->id);
		                                    @endphp
		                                    <img width="270" height="180" src="{{ asset('upload/post/' . $photo[0]) }}" class="attachment-870x400 size-870x400 wp-post-image" alt=""> </a>
	                                </div>
	                                <div class="post-info">
	                                    <h3 class="title14 dosis-font text-uppercase font-bold post-title"><a href="../flowing-studio-dress/index.html" class="black">{{$blog->title}}</a></h3>
	                                    <ul class="list-inline-block post-meta-data">
	                                        
	                                        <li><i aria-hidden="true" class="fa fa-comment color"></i>
	                                            <a href="../flowing-studio-dress/index.html#respond">0
	                                                Comments </a>
	                                        </li>
	                                    </ul>
	                                    <p class="desc">
	                                    	{{$blog->summary}}
	                                    </p> <a href="{{ route('home.detail_blog',$blog->id) }}" class="shop-button">Read more<i class="fa fa-angle-right"></i></a>
	                                </div>
	                            </div>
	                        </div>
	                        @endforeach
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div id="comments" class="comments-area comments blog-comment-detail">

	    </div><!-- #comments -->

	    <div class="leave-comments contact-form reply-comment">
	        <div id="respond" class="comment-respond">
	            <h3 id="reply-title" class="comment-reply-title">Leave Comments <small><a rel="nofollow" id="cancel-comment-reply-link" href="index.html#respond" style="display:none;">Cancel reply</a></small></h3>
	            <form action="http://7uptheme.com/wordpress/haustiere/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">



	                <p style="display: none;"><input type="hidden" id="akismet_comment_nonce" name="akismet_comment_nonce" value="8dcf859500"></p>
	                <p style="display: none;"></p>
	                <p class="contact-name">
	                    <input class="border" id="author" name="author" type="text" value="" placeholder="Name*">
	                </p>
	                <p class="contact-email">
	                    <input class="border" id="email" name="email" type="text" value="" placeholder="Email*">
	                </p>
	                <p class="contact-message">
	                    <textarea id="comment" class="border" rows="5" name="comment" aria-required="true" placeholder="Your comment*"></textarea>
	                </p>
	                <p class="form-submit"><input name="submit" type="submit" id="submit" class="shop-button" value="Post a comment"> <input type="hidden" name="comment_post_ID" value="1005" id="comment_post_ID">
	                    <input type="hidden" name="comment_parent" id="comment_parent" value="0">
	                </p> <input type="hidden" id="ak_js" name="ak_js" value="1540111048901">
	            </form>
	        </div><!-- #respond -->
	    </div>

	</div>
	@include('client.layouts.sidebar')
@endsection