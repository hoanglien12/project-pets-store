@extends('admin.layouts.master')
@section('title','Edit Product')
@section('content')
    <form role="form" method="POST" action="{{ route('product.edit', [$product->id]) }}" enctype="multipart/form-data">
        {{csrf_field()}}
        @include('admin.layouts.flash-msg')
        <div class="form-group">
            <label>Product Category</label>
            <br>
            <select name="product_cate" id="">
                @foreach($cate as $c)
                    <option value="{{ $c->id }}" {{ (old('product_cate') ? old('product_cate') : $product->id_product_cate) == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input name="name" class="form-control" value="{{ old('name') ? old('name') : $product->name }}">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control" value="{{ old('price') ? old('price') : $product->price }}">
        </div>
        <div class="form-group">
            <label>Sale</label>
            <input type="text" name="sale" class="form-control" value="{{ old('sale') ? old('sale') : $product->sale }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input name="description" class="form-control" value="{{ old('description') ? old('description') : $product->description }}">
        </div>
        <div class="form-group">
            <label>Photos</label> 
            <i style="color: blue; padding-left: 20px;">Keep Ctrl to select multiphotos!</i>
            <input type="file" name="photos[]" class="form-control" multiple>
        </div>
        <button type="submit" name="btnAdd" class="btn btn-success">Edit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection