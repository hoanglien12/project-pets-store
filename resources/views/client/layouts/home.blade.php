@extends('client.layouts.master')
@section('title','Pets Store')
@section('content')
	@include('client.slider.slider')

    @include('client.dog.dog_age')
    
	@include('client.about.about_home')
	
	@include('client.dog.dog_home')
	
	@include('client.about.people_say')

	@include('client.blog.blog_home')
   
@endsection