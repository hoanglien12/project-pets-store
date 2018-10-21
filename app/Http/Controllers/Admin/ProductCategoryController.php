<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminAddProductCategoryRequest;
use App\Http\Requests\AdminEditProductCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategory = ProductCategory::paginate(10);

        return view('admin.product-category.show', ['cate' => $productCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product-category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminAddProductCategoryRequest $request)
    {
        $cate = new ProductCategory();
        $cate->name = $request->name;
        $cate->description = $request->description;
        $cate->save();

        return redirect()->route('product_category.show')->with('success', 'Add ' . $request->name . ' successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        return view('admin.layouts.home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = ProductCategory::find($id);

        return view('admin.product-category.edit', ['cate' => $cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminEditProductCategoryRequest $request, $id)
    {
        $cate = ProductCategory::find($id);
        $cate->name = $request->name;
        $cate->description = $request->description;
        $cate->save();

        return redirect()->route('product_category.show')->with('success', 'Edit '. $request->name . ' successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductCategory::destroy($id);

        return redirect()->route('product_category.show')->with('success', 'Delete successful!');
    }
}
