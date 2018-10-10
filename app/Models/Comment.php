<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\Dog;

class Comment extends Model
{
    public function user()
    {
    	return $this->belongsTo('User', 'id_user');
    }

    public function product()
    {
    	return $this->belongsTo('Product', 'id_product');
    }

    public function dog()
    {
    	return $this->belongsTo('Dog', 'id_dog');
    }
}
