@extends('admin.layouts.master')
@section('title','Edit Product')
@section('content')
    <form role="form" method="POST" action="{{ route('product.edit', [$product->id]) }}" enctype="multipart/form-data">
        {{csrf_field()}}
        {{-- @include('admin.errors.error') --}}
        <div class="form-group">
            <label>Name</label>
            <input name="name" class="form-control" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control" value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input name="description" class="form-control" value="{{ $product->description }}">
        </div>
        <div class="form-group">
            <label>Photos</label>
            <input type="file" name="photos[]" class="form-control" multiple>
        </div>
        <div class="form-group">
            <label>Product Category</label>
            <br>
            <select name="product_cate" id="">
                @foreach($cate as $c)
                    <option value="{{ $c->id }}" {{ $product->id_product_cate == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" name="btnAdd" class="btn btn-success">Edit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection