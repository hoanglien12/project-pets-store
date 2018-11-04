<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\DogCategory; 
use App\Models\ProductCategory;
use App\Models\Product; 
use App\Models\Cart; 
use App\Models\Post;
 
class HomeController extends Controller 
{

    public function index() 
    {
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();
        $dogs                = Dog::all();
        $blogs               = Post::all();
        $slider              = Post::where('hot',1)->first();
        $about_us            = Post::where('slugs','ve-chung-toi')->get();
        // dd($slider);
    	return view('client.layouts.home',compact('dogCategories','productCategories','dogs','blogs','slider','about_us'));
    }

    public function dog_category()
    {
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        return view('client.dog-category.index', compact('dogCategories','productCategories'))   ;
    }
    public function dog_home() 
    {
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $dogs                = Dog::all();
        $dog_sale            = Dog::where('sale','<>',0)->get();
        return view('client.dog.dog_home',compact('dogCategories','productCategories','dogs'));
    }

    public function dog($idCate = null)
    {
       
        $dogs                = Dog::where('id_dog_cate',$idCate)->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $cate                = DogCategory::where('id',$idCate)->first();
        // dd($cate);
        return view('client.dog.dog',compact('dogs','dog_id','dogCategories','product','productCategories','cate'));
    }
    public function detail_dog($id)
    {
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $dogs                = Dog::where('id',$id)->first();
        $dog_rl              = Dog::where('id_dog_cate',$dogs->id_dog_cate)->get();
        return view('client.dog.detail_dog',compact('dogCategories','dogs','productCategories','dog_rl'));
    }
//product
    public function product_category()
    {
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $products            = Product::all();
        return view('client.product-category.index', compact('dogCategories','productCategories','products'))   ;
    }
      public function product($id)
    {
        $dog_id              = Product::where('id_product_cate',$id)->get();
        $dogCategories       = DogCategory::all();
        $product             = Product::where('id_product_cate',$id)->get();
        $productCategories   = ProductCategory::all();
        return view('client.product.product',compact('dogs','dog_id','dogCategories','product','productCategories'));
    }
    public function detail_product($id)
    {
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $dogs                = Product::where('id',$id)->first();
        $dog_rl              = Product::where('id_product_cate',$dogs->id_product_cate)->paginate(3);
        return view('client.product.detail_product',compact('dogCategories','dogs','productCategories','dog_rl'));
    }

    public function blog()
    {
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();
        $blogs               = Post::all();
        
    	return view('client.blog.blog',compact('dogCategories','productCategories','blogs'));
    }

    public function detail_blog($id)
    {
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();

        $blog                = Post::where('id',$id)->first();
        $blogs_other         = Post::where('id','<>',$id)->get();
        // dd($blogs_other);
    	return view('client.blog.detail_blog', compact('dogCategories','productCategories','blog','blogs_other'));
    }
}
