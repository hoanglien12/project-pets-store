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

class CartController extends Controller
{
    public function addDogToCart(Request $req,$id){
                    
        $dog_add             = Dog::find($id);          
        $oldCart             = Session('cart')?Session::get('cart'):null;
        $cart                = new Cart($oldCart);                   
        $cart->add($dog_add, $id);
        //dd($cart);            
        $req->session()->put('cart',$cart);
        return redirect()->back();         
    } 

     public function addProductToCart(Request $req,$id){
                    
        $product_add         = Product::find($id);
        $oldCart             = Session('cart')?Session::get('cart'):null;
        $cart                = new Cart($oldCart);                   
        $cart->add($product_add,$id);
        //dd($cart);            
        $req->session()->put('cart',$cart);
        return redirect()->back();         
    } 
    public function removeItem($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function viewCart(){
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        if(!Session::has('cart')){
            return view('client.cart.viewcart',['items'=>null],compact('site_phone','site_address','dogCategories','productCategories'));

        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        return view ('client.cart.viewcart',['items'=> $cart->items,
            'totalPrice'=>$cart->totalPrice],compact('site_phone','site_address','dogCategories','productCategories'));

    }

    public function deleteAll(Request $request)
    {
        $request->session()->forget('cart');

        return redirect()->back();
    }
    
    public function getCheckout(){
        if(Session::has('cart'))
        {
            $site_phone          = SiteConfig::where('label','site_phone')->get();
            $site_address        = SiteConfig::where('label','site_address')->get();
           
            $dogCategories       = DogCategory::all();
            $productCategories   = ProductCategory::all();

            return view('client.cart.checkout',compact('dogCategories','productCategories','site_address','site_phone'));
        }
        else{
            return redirect()->back()->with('error', 'Ban chua co san pham trong gio hang');
        }
        
    }
}
