<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;

class Product extends Model
{
    public function productcategory()
    {
    	return $this->belongsTo('ProductCategory', 'id_product_cate');
    }
}
