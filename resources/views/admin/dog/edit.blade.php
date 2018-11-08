@extends('admin.layouts.master')
@section('title','Edit Dogs')
@section('content')
<hr>
    <h2>Edit <span style="color: red;">{{ $dog->name }}</span></h2>
    @include('admin.layouts.flash-msg')
    
    <form action="{{ route('dog.update',$dog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="category" class="col-md-3">Dog Category</label>
            <div class="col-md-9">
                <select name="category" id="category" class="form-control">
                @foreach($dog_category as $category)
                
                <option value="{{ $category->id }}" {{ (isset($dog->id_dog_cate) && ($category->id == $dog->id_dog_cate)) ? "selected" : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            </div>
            
        </div>
        <div class="form-group">
            <label for="email" class="col-md-3">Name:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="name" name="name" value="{{ $dog->name }}" onkeyup="ChangeToSlug();">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Slugs</label>
                <div class="col-md-9">
                    <input name="slugs" value="{{ $dog->slugs }}" placeholder="Slugs" id="slug" type="text" readonly class="form-control" >
                </div>
            </div>
        <div class="form-group">
            <label class="col-md-3">Photos</label>
            <div class="col-md-9">
                <input type="file" name="photos[]" class="form-control" multiple">
                @php
                    $photos = $dog->getImage($dog->id);
                @endphp
                @if($photos != null)
                @foreach ($photos as $photo)
                    <img src="{{ asset('upload/dogs/' . $photo) }}" alt="" style="width: 150px;height: 100px;">
                @endforeach
                @else
                    <p>no photo</p>
                @endif
            </div>
            
        </div>
        <div class="form-group">
            <label for="price" class="col-md-3">Price:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="price" name="price" value="{{ $dog->price }}">
            </div>
        </div>
        <div class="form-group">
            <label for="sale" class="col-md-3">Sale:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="sale" name="sale" value="{{ $dog->sale }}">
            </div>
        </div>
        <div class="form-group">
            <label for="pwd" class="col-md-3">Infomation:</label>
            <div class="input-group input-large date-picker input-daterange col-md-9">
                <div class="col-md-5">
                    <input type="text" class="form-control" id="height" name="height" placeholder="height" value="{{ $dog->height }}">
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="weight" name="weight" placeholder="weight" value="{{ $dog->weight }}">
                </div>
                <div class="col-md-2">
                    <div class="input-group input-large date-picker input-daterange">
                        <input value="{{old('birthday')}}" name="birthday" placeholder="birthday" data-toggle="datepicker" data-provide="datepicker" type="text" class="form-control" value="{{ $dog->birthday }}">
                    </div>
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <label for="pwd" class="col-md-3">Description:</label>
            <div class="col-md-9">
            <input type="text" class="form-control" id="description" name="description">
                
            </div>
        </div>
        <div class="form-actions">
            
            <div class="col-md-3"></div>
            <div class=" col-md-9">
                <button type="submit" class="btn green btn-outline">
                    <i class="fa fa-check"></i> Submit
                </button>
                <button type="reset" name="reset" class="btn default">Cancel</button>
            </div>
        </div>
    </form>
@endsection
