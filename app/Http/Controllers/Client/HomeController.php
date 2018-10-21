<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\DogCategory;
use App\Models\ProductCategory;

class HomeController extends Controller
{
    public function index()
    {
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();
    	return view('client.layouts.home',compact('dogCategories','productCategories'));
    }

    public function dog()
    {
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();
    	return view('client.dog.dog',compact('dogCategories','productCategories'));
    }

    public function detail_dog()
    {
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        return view('client.dog.detail_dog',compact('dogCategories','productCategories'));
    }

    public function blog()
    {
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();
    	return view('client.blog.blog',compact('dogCategories','productCategories'));
    }

    public function detail_blog()
    {
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();
    	return view('client.blog.detail_blog', compact('dogCategories','productCategories'));
    }
}
