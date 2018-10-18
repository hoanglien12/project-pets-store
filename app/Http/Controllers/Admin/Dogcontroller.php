<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\DogCategory;
use App\Http\Requests\AdminDogRequest;

class Dogcontroller extends Controller
{
    protected $dog;
	protected $dog_category;
	public function __construct(){
		$this->dog 			= new Dog();
		$this->dog_category = new DogCategory();
	}
	public function index(Request $request){
		$request->flash();
        $name           = $request->input('name');
        $category_id	= $request->input('category_id');
        $price			= $request->input('price');
        $begin_date     = $request->input('begin_date');
        $end_date       = $request->input('end_date');

        $count_dogs 	= count($this->dog->getAllDogs($name, $category_id,$price, $begin_date, $end_date)->get());
        // dd($count_dogs);
		$dogs 			= $this->dog->getAllDogs($name, $category_id, $price, $begin_date, $end_date)->paginate(10);
		// dd($dogs);
		$dog_category   = $this->dog_category->getAllDogCategories()->get();
		// dd($dog_category);
		return view('admin.dog.index', compact('dogs','dog_category','count_dogs'));
	}

	public function add()
	{
		$dog_category = $this->dog_category->getAllDogCategories()->get();
		return view('admin.dog.create',compact('dog_category'));
	} 

	public function store(AdminDogRequest $request)
	{
		$request->flash();
		// dd($request->category_id);
		$birthday = null;
		if(!empty($request->get('birthday'))) {
			$birthday = date('Y:m:d',strtotime($request->get('birthday')));
		}
		$newDog = Dog::create([
                'name'          => $request->get('name'),
                'photos'		=> $request->get('photo'),
                'description'   => $request->get('description'),
                'id_dog_cate'   => $request->get('category_id'),
                'price'         => $request->get('price'),
                'height'        => $request->get('height'),
                'weight'        => $request->get('weight'),
                'birthday'      => $birthday,
            ]);

		if(!$newDog){
			$request->session()->flash('alert-warning','Update fail');
		}
		else{
			$request->session()->flash('alert-success','Update ' .$request->name. ' successfully');
		}
        return redirect()->route('dog.index');
	}
	public function edit($id)
	{
		$dog = Dog::findOrFail($id);
		$dog_category = $this->dog_category->getAllDogCategories()->get();
		return view('admin.dog.edit',compact('dog','dog_category'));
	} 

	public function update(Request $request,$id)
	{
		$request->flash();

		$birthday = null;

		if(!empty($request->get('birthday'))) {
			$birthday = date('Y:m:d',strtotime($request->get('birthday')));
		}

		$update = Dog::query()->findOrFail($id);
		$update->update([
			'name'          => $request->name,
			'photos'		=> $request->photo,
            'description'   => $request->description,
            'price'         => $request->price,
            'birthday'      => $request->birthday,
            'height'        => $request->height,
            'weight'        => $request->weight
		]);
		// dd($update);
		if(!$update){
			$request->session()->flash('alert-warning','Update fail');
		}
		else{
			$request->session()->flash('alert-success','Update ' .$request->name. ' successfully');
		}
		return redirect()->route('dog.index');
	}

	public function delete(Request $request,$id)
	{
		$request->flash();
		$dog = Dog::findOrFail($id);
		$dog->delete();
		if(!$dog){
			$request->session()->flash('alert-warning','Delete fail');
		}
		else{
			$request->session()->flash('alert-success','Delete ' . $dog->name . ' successfully');
		}
		return redirect()->route('dog.index');
	}
}
