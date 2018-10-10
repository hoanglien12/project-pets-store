<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dog;

class DogCategory extends Model
{
    public function dog()
    {
    	return $this->hasMany('Dog', 'id_dog_cate', 'id');
    }
}
