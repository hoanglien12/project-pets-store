@extends('admin.layouts.master')
@section('title','Edit Dogs')
@section('content')
    <h2>Edit <span style="color: red;">{{ $dog->name }}</span></h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('dog.update',$dog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="category">Dog Category</label>
            <select name="category" id="category" class="form-control">
                @foreach($dog_category as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $dog->name }}">
        </div>
        <div class="form-group">
            <label>Photos</label>
            <input type="file" name="photos" class="form-control" multiple>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $dog->price }}">
        </div>
        
        <div class="form-group">
            <label for="pwd">Infomation:</label>
            <div class="input-group input-large date-picker input-daterange">
                <div class="col-md-3">
                    <input type="text" class="form-control" id="height" name="height" placeholder="height" value="{{ $dog->height }}">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="weight" name="weight" placeholder="weight" value="{{ $dog->weight }}">
                </div>
                <div class="col-md-3">
                    <div class="input-group input-large date-picker input-daterange">
                        <input value="{{old('birthday')}}" name="birthday" placeholder="birthday" data-toggle="datepicker" data-provide="datepicker" type="text" class="form-control" value="{{ $dog->birthday }}">
                    </div>
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <label for="pwd">Description:</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection