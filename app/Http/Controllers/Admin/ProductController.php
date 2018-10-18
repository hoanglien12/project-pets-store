<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(10);

        return view('admin.product.show', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = ProductCategory::all();

        return view('admin.product.add', ['cate' => $cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $files = $request->file('photos');
        $filename_arr = [];
        $i = 1;
        foreach ($files as $file){
            $filename = $i . time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/product_images'), $filename);
            $filename_arr[] = $filename;
            $i++;
        }
        $product->photos = json_encode($filename_arr);
        $product->id_product_cate = $request->product_cate;
        $product->save();
        
        return redirect()->route('product.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = ProductCategory::all();
        $product = Product::find($id);

        return view('admin.product.edit', ['product' => $product, 'cate' => $cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        if($files = $request->file('photos'))
        {
            $filename_arr = [];
            $i =1;
            foreach ($files as $file){
                $filename = $i.time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('/product_images'), $filename);
                $filename_arr[] = $filename;
                $i++;
            }
            $product->photos = json_encode($filename_arr);
        }
        $product->id_product_cate = $request->product_cate;
        $product->save();
        
        return redirect()->route('product.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->back();
    }
}
