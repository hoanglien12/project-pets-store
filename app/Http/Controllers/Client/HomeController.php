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
use App\Models\Comment;
use App\Models\SiteConfig;
use App\Models\DetailOrder;

use Illuminate\Support\Facades\Auth;
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
        $about_us            = Post::where('slugs','about-us')->first();
        // dd($about_us);
        $dogs_in_order       = DetailOrder::where('id_dog','<>','')->get();
        // dd($dogs_in_order[1]->id_dog);
        foreach ($dogs_in_order as $value) {
            $dog_id[]        = $value->id_dog;
        }
        
        $best_dogs           = Dog::whereIn('id',$dog_id)->get();
        
        $sale_dogs           = Dog::where('sale','<>',0)->get();
        $new_dogs            = $this->dog->new_dog()->get();

        // dd($new_dogs);

    	return view('client.layouts.home',compact(
            'dogCategories','productCategories','dogs','blogs','slider','about_us',
            'site_phone','site_address','sale_dogs','new_dogs','best_dogs'
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
        $dogs                = Dog::all();
        $dogs_sale           = Dog::where('sale','<>',0)->get();

        return view('client.dog.dog_home',compact('dogCategories','productCategories','dogs','dogs_sale','site_phone','site_address'));
    }

    public function dog($idCate = null)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogs                = Dog::where('id_dog_cate',$idCate)->paginate(6);
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $cate                = DogCategory::where('id',$idCate)->first();
        // dd($cate);
      
        return view('client.dog.dog',compact('dogs','dog_id','dogCategories','product','productCategories','cate','site_phone','site_address','dogs'));
    }
    public function detail_dog($id)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $dogs                = Dog::where('id',$id)->first();
        $dog_orther          = Dog::where('id_dog_cate',$dogs->id_dog_cate)->get();
        $comment_dog         = Comment::where('id_dog', $id)->get();

        return view('client.dog.detail_dog',compact('dogCategories','dogs','productCategories','dog_orther','site_phone','site_address', 'comment_dog'));
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
        $products            = Product::where('id_product_cate',$id)->paginate(6);
        $dogCategories       = DogCategory::all();
        // $product             = Product::where('id_product_cate',$id)->get();
        $productCategories   = ProductCategory::all();
        $cate                = ProductCategory::where('id',$id)->first();
        return view('client.product.product',compact('dogs','products','dogCategories','productCategories','site_phone','site_address','cate'));
    }
    public function detail_product($id)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        $products            = Product::where('id',$id)->first();
        $product_other       = Product::where('id_product_cate',$products->id_product_cate)->paginate(3);
        $comment_product     = Comment::where('id_product', $id)->get();

        return view('client.product.detail_product',compact('dogCategories','products','productCategories','product_other','site_phone','site_address', 'comment_product'));
    }

    public function blog()
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
    	$dogCategories 		 = DogCategory::all();
    	$productCategories	 = ProductCategory::all();
        $blogs               = Post::paginate(3);
        
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
        $comment_post        = Comment::where('id_post', $id)->get();

    	return view('client.blog.detail_blog', compact('dogCategories','productCategories','blog','blogs_other','site_phone','site_address', 'comment_post'));
    }

    public function search(Request $request)
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();

        $value     = $request->input('search');

        $dogs      = Dog::join('dog_categories','dogs.id_dog_cate','=','dog_categories.id')
                        ->where('dogs.name','like',"%$value%")
                        ->orWhere('price',$value)
                        ->orWhere('sale',$value)
                        ->orWhere('dog_categories.name','like',"%$value%")
                        ->orWhere('dogs.description','like',"%$value%")
                        ->select('dogs.*')->get();
                        // dd($dogs);
        $products  = Product::join('product_categories','products.id_product_cate','=','product_categories.id')
                        ->where('products.name','like',"%$value%")
                        ->orWhere('price',$value)
                        ->orWhere('sale',$value)
                        ->orWhere('product_categories.name','like',"%$value%")
                        ->orWhere('products.description','like',"%$value%")
                        ->select('products.*')->get();
        $blogs     = Post::where('title','like',"%$value%")
                        ->orWhere('summary','like',"%$value%")
                        ->orWhere('source','like',"%$value%")
                        ->orWhere('author','like',"%$value%")                      
                        ->orWhere('content','like',"%$value%")->get();
        if(isset($dogs) || isset($products) || isset($blogs)){

        }
        else{
            $request->session()->flash('fail','Please enter key for search');

        }
        
        return view('client.layouts.search',compact('site_address','site_phone','dogCategories','productCategories','value','dogs','products','blogs'));

    }

    public function sort_dog(Request $request)
    {

        $data          = $request->all();
        $get_value     = $data['get_value'];
        $get_id        = $data['get_id'];
        // dd($get_id);
        // console($check->active);
        if($get_value == 'price'){
            $dogs     = Dog::where('id_dog_cate',$get_id)->orderBy('price', 'asc')->paginate(6);
        }
        else{
            $dogs     = Dog::where('id_dog_cate',$get_id)->orderBy('price', 'desc')->paginate(6);
        } 
        return view('client.dog.reload-dogs',compact('dogs'));
    }

    public function sort_product(Request $request)
    {

        $data          = $request->all();
        $get_value     = $data['get_value'];
        $get_id        = $data['get_id'];
        // dd($get_id);
        // console($check->active);
        if($get_value == 'price'){
            $products     = Product::where('id_product_cate',$get_id)->orderBy('price', 'asc')->paginate(6);
        }
        else{
            $products     = Product::where('id_product_cate',$get_id)->orderBy('price', 'desc')->paginate(6);
        } 
        return view('client.product.reload-products',compact('products'));
    }

    public function about_us()
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();

        $about_us            = Post::where('slugs','about-us')->first();

        return view('client.about', compact('site_address','site_phone','dogCategories','productCategories','about_us'));
    }
    public function contact()
    {
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $site_mail           = SiteConfig::where('label','site_mail')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();

        return view('client.contact', compact('site_address','site_phone','dogCategories','productCategories','site_mail'));
    }
}
