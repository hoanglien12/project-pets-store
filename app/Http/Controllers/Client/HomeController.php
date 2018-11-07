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
use App\Models\SiteConfig;
use Session;
 
class HomeController extends Controller 
{

    function __construct()
    {
        $this->dog          = new Dog();
    }
    public function index() 
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();
        // $dogs                = Dog::all();
        $blogs               = Post::all();
        $slider              = Post::where('hot',1)->first();
        $about_us            = Post::where('slugs','ve-chung-toi')->get();
        // dd($slider);
        $sale_dogs           = Dog::where('sale','<>',0)->get();
        $new_dogs            = $this->dog->new_dog()->get();
        // dd($sale_dogs);

    	return view('client.layouts.home',compact(
            'dogCategories','productCategories','dogs','blogs','slider','about_us',
            'site_phone','site_address','sale_dogs','new_dogs'
        ));
    }

    public function dog_category()
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        // dd($site_phone);
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        return view('client.dog-category.index', compact('dogCategories','productCategories','site_phone','site_address'))   ;
    }
    public function dog_home() 
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $dogs                = Dog::orderBy('created_at','desc')->get();
        $dogs_sale            = Dog::where('sale','<>',0)->get();
        // dd($dog_sale);
        return view('client.dog.dog_home',compact('dogCategories','productCategories','dogs','dogs_sale','site_phone','site_address'));
    }

    public function dog($idCate = null)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogs                = Dog::where('id_dog_cate',$idCate)->orderBy('created_at','desc')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $cate                = DogCategory::where('id',$idCate)->first();
        // dd($cate);
        return view('client.dog.dog',compact('dogs','dog_id','dogCategories','product','productCategories','cate','site_phone','site_address'));
    }
    public function detail_dog($id)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $dogs                = Dog::where('id',$id)->first();
        $dog_orther          = Dog::where('id_dog_cate',$dogs->id_dog_cate)->get();
        return view('client.dog.detail_dog',compact('dogCategories','dogs','productCategories','dog_orther','site_phone','site_address'));
    }
//product
    public function product_category()
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $products            = Product::all();
        return view('client.product-category.index', compact('dogCategories','productCategories','products','site_phone','site_address'))   ;
    }
      public function product($id)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $products            = Product::where('id_product_cate',$id)->get();
        $dogCategories       = DogCategory::all();
        $product             = Product::where('id_product_cate',$id)->get();
        $productCategories   = ProductCategory::all();
        return view('client.product.product',compact('dogs','products','dogCategories','product','productCategories','site_phone','site_address'));
    }
    public function detail_product($id)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $dogs                = Product::where('id',$id)->first();
        $product_other       = Product::where('id_product_cate',$dogs->id_product_cate)->paginate(3);
        return view('client.product.detail_product',compact('dogCategories','dogs','productCategories','product_other','site_phone','site_address'));
    }

    public function blog()
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();
        $blogs               = Post::all();
        
    	return view('client.blog.blog',compact('dogCategories','productCategories','blogs','site_phone','site_address'));
    }

    public function detail_blog($id)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();

        $blog                = Post::where('id',$id)->first();
        $blogs_other         = Post::where('id','<>',$id)->get();
        // dd($blogs_other);
    	return view('client.blog.detail_blog', compact('dogCategories','productCategories','blog','blogs_other','site_phone','site_address'));
    }

     public function addtocart(Request $req,$id){
                    
        $dog_add             = Dog::find($id);
        $product_add         = Product::find($id);
        $oldCart             = Session('cart')?Session::get('cart'):null;
        $cart                = new Cart($oldCart);  
        $cart->add($dog_add, $id);
        //dd($cart);            //dd($cart);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    } 
    public function getcheckout(){
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dog_ft              = Dog::all();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        return view('client.cart.checkout',compact('dogCategories','productCategories','dog_ft','site_address','site_phone'));
    }
}
