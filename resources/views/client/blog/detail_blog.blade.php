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
	    </div><div class="clear"></div>
		    <div class="single-related-post">
		        <h2 class="title18 font-bold text-uppercase title-single-related-post">
		            COMMENTS
		        </h2>
		        <div class="related-post-slider">
		            <div class="wrap-item smart-slider owl-carousel owl-theme" data-item="" data-speed="" data-itemres="0:1,480:2,990:3" data-prev="" data-next="" data-pagination="" data-navigation="" style="opacity: 1; display: block;">
		                <div class="owl-wrapper-outer">
		                    <div class="owl-wrapper" style="width: 3600px; left: 0px; display: block;">
		                        <div class="owl-item active" style="width: 300px;">
		                            <div class="item-post item-post-default">
		                                <div class="post-thumb banner-advs zoom-image fly-hoz">
		                                    <a href="#">
			                                    <img width="270" height="180" src="" class="attachment-870x400 size-870x400 wp-post-image" alt=""> </a>
		                                </div>
		                                <div class="post-info">
		                                	@foreach($comment_post as $cmt)
		                                    <h3 class="title14 dosis-font text-uppercase font-bold post-title"><a href="../flowing-studio-dress/index.html" class="black">{{ $cmt->user->name }}</a></h3>
		                                    <ul class="list-inline-block post-meta-data">
		                                        <li><i aria-hidden="true" class="fa fa-comment color"></i>
		                                            <h6 style="display: inline; font-size: 17px;">{{ $cmt->comment }}</h6>
		                                        </li>
		                                    </ul>
		                                    @endforeach
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		    <div id="comments" class="comments-area comments blog-comment-detail">
		    </div><!-- #comments -->

		    @if(Auth::check())
		    	<div class="leave-comments contact-form reply-comment" style="margin-bottom: 50px;">
			        <div id="respond" class="comment-respond">
			            <h3 id="reply-title" class="comment-reply-title">Leave Comments</h3>
			            <form action="{{ url('blog/comment/'. $blog->id) }}" method="POST" id="commentform" class="comment-form" novalidate="">
			            	@csrf
			               	<input type="hidden" name="id_post" id="" value="{{ $blog->id }}">
			                <textarea name="comment" id="" cols="30" rows="8"></textarea>
			                <br>
			                <button type="submit" class="btn btn-primary">Post a comment</button>
			            </form>
			        </div><!-- #respond -->
			    </div>
		    @endif
		<div class="clear"></div>
		    <div class="single-related-post">
		        <h2 class="title18 font-bold text-uppercase title-single-related-post">
		            COMMENTS
		        </h2>
		        <div class="related-post-slider">
		            <div class="wrap-item smart-slider owl-carousel owl-theme" data-item="" data-speed="" data-itemres="0:1,480:2,990:3" data-prev="" data-next="" data-pagination="" data-navigation="" style="opacity: 1; display: block;">
		                <div class="owl-wrapper-outer">
		                    <div class="owl-wrapper" style="width: 3600px; left: 0px; display: block;">
		                        <div class="owl-item active" style="width: 300px;">
		                            <div class="item-post item-post-default">
		                                <div class="post-thumb banner-advs zoom-image fly-hoz">
		                                    <a href="#">
			                                    <img width="270" height="180" src="" class="attachment-870x400 size-870x400 wp-post-image" alt=""> </a>
		                                </div>
		                                <div class="post-info">
		                                    <h3 class="title14 dosis-font text-uppercase font-bold post-title"><a href="../flowing-studio-dress/index.html" class="black">Hoai</a></h3>
		                                    <ul class="list-inline-block post-meta-data">
		                                        <li><i aria-hidden="true" class="fa fa-comment color"></i>
		                                            <h6 style="display: inline; font-size: 17px;">Yeu lam</h6>
		                                        </li>
		                                    </ul>
		                                    <h3 class="title14 dosis-font text-uppercase font-bold post-title"><a href="../flowing-studio-dress/index.html" class="black">Hoai</a></h3>
		                                    <ul class="list-inline-block post-meta-data">
		                                        <li><i aria-hidden="true" class="fa fa-comment color"></i>
		                                            <h6 style="display: inline; font-size: 17px;">Yeu lam</h6>
		                                        </li>
		                                    </ul>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		    <div id="comments" class="comments-area comments blog-comment-detail">
		    </div><!-- #comments -->
		    <div class="leave-comments contact-form reply-comment" style="margin-bottom: 50px;">
		        <div id="respond" class="comment-respond">
		            <h3 id="reply-title" class="comment-reply-title">Leave Comments <small><a rel="nofollow" id="cancel-comment-reply-link" href="index.html#respond" style="display:none;">Cancel reply</a></small></h3>
		            <form action="http://7uptheme.com/wordpress/haustiere/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">

		                <p style="display: none;"><input type="hidden" id="akismet_comment_nonce" name="akismet_comment_nonce" value="8dcf859500"></p>
		                <p style="display: none;"></p>
		                <p class="contact-message">
		                    <textarea id="comment" class="border" rows="5" name="comment" aria-required="true" placeholder="Your comment"></textarea>
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