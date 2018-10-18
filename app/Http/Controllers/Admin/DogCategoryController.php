<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DogCategory;
use App\Http\Requests\AdminDogCategoryRequest;

class DogCategoryController extends Controller
{
	public function __construct()
	{
		$this->dogCategory = new DogCategory();
	}

	
    public function index(Request $request){
        $request->flash();
        $name           = $request->input('name');
        $begin_date     = $request->input('begin_date');
        $end_date       = $request->input('end_date');
        $origin			= $request->input('origin');

        $count_category = count($this->dogCategory->getAllDogCategories($name, $begin_date, $end_date)->get());
        $dogCategories  = $this->dogCategory->getAllDogCategories($name,$begin_date,$end_date)->paginate(4);
        return view('admin.dog-category.index',compact('dogCategories','name','date','end_date','count_category'));
    }

    public function add()
    {
        return view('admin.dog-category.create');
    }

    public function store(AdminDogCategoryRequest $request){
    	// dd($request->origin);
        $store    		  = DogCategory::create([
            'name'        => $request->name,
            'description' => $request->description,
            'origin'	  => $request->origin
        ]);
        // dd($store);
        if (!$store) {
            $request->session()->flash('alert-warning','Insert ' .$request->name. ' fail');
        }
        else
        {
            $request->session()->flash('alert-success','Insert ' .$request->name. ' successfully');
        }
        return redirect()->route('dog_category.index');
    }

    public function edit($id){
        $dogCategory = DogCategory::findOrFail($id);
        return view('admin.dog-category.edit', compact('dogCategory'));
    }

    public function update(Request $request,$id){
        $request->flash();
        $update     = DogCategory::findOrFail($id);
        $update->update([
            'name'        => $request->name,
            'description' => $request->description,
            'origin'	  => $request->origin
        ]);
        if(!$update){
            $request->session()->flash('alert-warning','Update fail');
        }
        else{
            $request->session()->flash('alert-success','Update ' .$request->name. ' successfully');
        }
        return redirect()->route('dog_category.index');
    }

    public function delete(Request $request,$id){
        $request->flash();
        $delete = DogCategory::findOrFail($id);
        $delete->delete();
        if (!$delete) {
            $request->session()->flash('alert-warning', 'Delete fail');
        }
        else
        {
            $request->session()->flash('alert-success', 'Delete ' .$delete->name. ' successfully!');
        }

        return redirect()->route('dog_category.index');
    }
}
