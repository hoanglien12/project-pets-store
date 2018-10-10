<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DogCategory;

class Dog extends Model
{
    public function dogcategory()
    {
    	return $this->belongsTo('DogCategory', 'id_dog_cate');
    }
}
