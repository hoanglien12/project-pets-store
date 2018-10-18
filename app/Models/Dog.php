<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DogCategory;

class Dog extends Model
{
	protected $table = 'dogs';
    protected $guarded = ['id'];

    protected $fillable = [
        'name','id_dog_cate','price','birthday','height','weight', 'description','photos','created_at', 'updated_at'
    ];
    public function dogcategory()
    {
    	return $this->belongsTo('App\Models\DogCategory', 'id_dog_cate','id');
    }

    public function getAllDogs($name=null, $category_id=null,$price=null, $begin_date=null, $end_date=null)
    {
        $dogs = Dog::query();
        if($name != null){
            $dogs = Dog::where('name','like','%$name%');
        }
        if($category_id != null){
            $dogs = Dog::where('id_dog_cate',$category_id);
            // dd($dogs);
        }
        if($price != null){
            $dogs = Dog::where('price',$price);
        }
    	return $dogs;
    }
}
