<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dog;

class DogCategory extends Model
{
	protected $table = 'dog_categories';
    protected $guarded = ['id'];
    protected $fillable = [
        'name', 'description','origin','created_at', 'updated_at'
    ];
    
    
    public function dog()
    {
    	return $this->hasMany('Dog', 'id_dog_cate', 'id');
    }
    public function getAllDogCategories($name = null, $begin_date = null,$end_date = null)
    {
        $condition = array();
        if($name != null) {
            $condition[] = ['name', 'like', "%$name%"];
        }
        if($begin_date != null){
            $condition[] = ['created_at', '>=', "$begin_date"];
        }
        if($begin_date != null && $end_date != null){
            $condition[] = ['created_at','>=','$begin_date','<=','$end_date'];
        }
        $dogCategories = DogCategory::where($condition);
        return $dogCategories;
    }
}
