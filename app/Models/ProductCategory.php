<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductCategory extends Model
{
    public function product()
    {
    	return $this->hasMany('Category', 'id_product_cate', 'id');
    }

    public function getAllProductCategories($name = null, $begin_date = null,$end_date = null)
    {
        $productCategories = ProductCategory::query();
        if($name != null || $begin_date != null) {
            $productCategories = ProductCategory::where('name','like', "%$name%");
        }
        if($begin_date != null){
            $productCategories = ProductCategory::whereDate('created_at',date('Y-m-d', strtotime($begin_date)));
        }
        if($productCategories != null && $end_date != null){
            $dogCategories = ProductCategory::whereBetween(DB::raw('DATE(created_at)'), array(date('Y-m-d', strtotime($begin_date)), date('Y-m-d', strtotime($end_date))));
        }
        
        return $productCategories;
    }
}
