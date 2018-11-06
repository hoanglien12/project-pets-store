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
use Session;
class HomeController extends Controller 
{


    public function index() 
    {
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();
        $dog_ft              = Dog::all();
        $blogs               = Post::all();
        $slider              = Post::where('hot',1)->first();
        $about_us            = Post::where('slugs','ve-chung-toi')->get();
        // dd($slider);
    	return view('client.layouts.home',compact('dog_add','dogCategories','productCategories','dog_ft','blogs','slider','about_us'));
    }

    public function dog_category()
    {   
        $dog_ft              = Dog::all();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        return view('client.dog-category.index', compact('dog_add','dog_ft','dogs','dogCategories','productCategories'))   ;
    }
    public function dog_home() 
    {
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $dogs                = Dog::all();
        $dog_sale            = Dog::where('sale','<>',0)->get();
        return view('client.dog.dog_home',compact('dog_add','dogCategories','productCategories','dogs'));
    }

    public function dog($idCate = null)
    {   
        $dog_ft              = Dog::all();
        $dogs                = Dog::where('id_dog_cate',$idCate)->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $cate                = DogCategory::where('id',$idCate)->first();
        // dd($cate);
        return view('client.dog.dog',compact('dog_add','dog_ft','dogs','dog_id','dogCategories','product','productCategories','cate'));
    }
    public function detail_dog($id)
    {
        $dog_ft              = Dog::all();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $dogs                = Dog::where('id',$id)->first();
        $dog_rl              = Dog::where('id_dog_cate',$dogs->id_dog_cate)->get();
        return view('client.dog.detail_dog',compact('dog_add','dog_ft','dogCategories','dogs','productCategories','dog_rl'));
    }
//product
    public function product_category()
    {
        $dog_ft              = Dog::all();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $products            = Product::all();
        return view('client.product-category.index', compact('dog_add','dog_ft','dogCategories','productCategories','products','dogs'))   ;
    }
      public function product($id)
    {
        $dog_ft              = Dog::all();
        $products            = Product::where('id_product_cate',$id)->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        return view('client.product.product',compact('dog_add','dog_ft','products','dogCategories','product','productCategories'));
    }
    public function detail_product($id)
    {
        $dog_ft              = Dog::all();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $products            = Product::where('id',$id)->first();
        $product_other       = Product::where('id_product_cate',$products->id_product_cate)->get();
        return view('client.product.detail_product',compact('dog_add','dogs','dogCategories','products','productCategories','product_other'));
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
     public function addtocart(Request $req,$id){
        
        $dog_add             = Dog::find($id);
        $product_add         = Product::find($id);
        $oldCart             = Session('cart')?Session::get('cart'):null;
        $cart                = new Cart($oldCart);
        $cart->add($dog_add, $id,$product_add,$id);
        //dd($cart);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getcheckout(){
        $dog_ft              = Dog::all();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        return view('client.cart.checkout',compact('dogCategories','productCategories','dog_ft'));
    }
    

}
