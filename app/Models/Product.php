<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\Product;

class Product extends Model
{
    public function productcategory()
    {
    	return $this->belongsTo('App\Models\ProductCategory', 'id_product_cate', 'id');
    }

    public function getImage($idProduct)
	{
		$product = Product::find($idProduct);
		$images = $product->photos;
		$imgs = json_decode($images);
		
		return $imgs;
	}
}
