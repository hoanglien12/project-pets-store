@extends('client.layouts.master')
@section('title','Blog')
@section('content')
    <div class="content-wrap content-sidebar-right col-md-9 col-sm-8 col-xs-12">
    <div class="title-page clearfix">
        <h2 class="title30 font-bold dosis-font text-uppercase pull-left">Blog</h2>
        <ul class="sort-pagi-bar list-inline-block pull-right">
            <li>
                <div class="dropdown-box show-by">
                    <a href="#" class="dropdown-link"><span class="gray">Per Page:</span><span class="silver number">12</span></a>
                    <ul class="dropdown-list list-none">
                        <li><a data-number="12" class="" href="indexcae9.html?number=12">12</a></li>
                        <li><a data-number="16" class="" href="index76a2.html?number=16">16</a></li>
                        <li><a data-number="20" class="" href="index5167.html?number=20">20</a></li>
                        <li><a data-number="24" class="" href="indexf213.html?number=24">24</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="view-type">
                    <span class="gray">View As:</span>
                    <a data-type="grid" href="indexcc26.html?type=grid" class="grid-view  "><i class="fa fa-th-large"></i></a>
                    <a data-type="list" href="indexbf35.html?type=list" class="list-view  active"><i class="fa fa-reorder"></i></a>
                </div>
            </li>
        </ul>
    </div>
    <div class="js-content-wrap blog-list-view " data-column="3">
        <div class="js-content-main list-post-wrap row">
            @foreach($blogs as $blog)
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="item-post item-post-large item-default">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="post-thumb banner-advs zoom-image overlay-image">
                                <a href="{{ route('home.detail_blog',$blog->id) }}" class="adv-thumb-link">
                                    @php
                                        $photo = $blog->getImage($blog->id);
                                    @endphp
                                    <img width="870" height="400" src="{{ asset('upload/post/' . $photo[0]) }}" class="attachment-870x400 size-870x400 wp-post-image" alt=""> </a>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="post-info">
                                <h3 class="title24 post-title dosis-font font-bold">
                                    <a href="" class="black">
                                        {{$blog->title}}
                                    </a>
                                </h3>
                                <p class="desc">
                                    {{$blog->summary}}
                                </p>
                                <ul class="list-inline-block post-meta-data">
                                    <li><i class="fa fa-calendar color"></i><span class="gray">{{ date('Y-m-d',strtotime($blog->created_at))}}</span></li>
                                    <li><i aria-hidden="true" class="fa fa-comment color"></i>
                                        <a href="../flowing-studio-dress-2/index.html#respond">0
                                            Comments </a>
                                    </li>
                                    <li><i class="fa fa-folder-open color" aria-hidden="true"></i>
                                        <a href="../category/french-bulldog/index.html" rel="category tag">French Bulldog</a> <a href="../category/accessories/index.html" rel="category tag">German Shepherd</a> </li>
                                </ul>
                                <a href="{{ route('home.detail_blog',$blog->id) }}" class="shop-button">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagi-nav text-center ">
            <span aria-current="page" class="page-numbers current">1</span>
            <a class="page-numbers" href="page/2/index.html">2</a>
            <a class="page-numbers" href="page/3/index.html">3</a>
            <a class="next page-numbers" href="page/2/index.html"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div>


    </div>
</div>
    @include('client.layouts.sidebar')

@endsection