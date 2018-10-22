@extends('admin.layouts.master')
@section('title','Edit Dog Categories')
@section('content')

    <h2>Edit <span style="color: red;">{{ $dogCategory->name }}</span></h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('dog_category.update',$dogCategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter email" name="name" value="{{ $dogCategory->name }}">
        </div>
        <div class="form-group">
            <label for="pwd">Description:</label>
            <input type="text" class="form-control" id="description" placeholder="Enter password" name="description" value="{{ $dogCategory->description }}">
        </div>
        <div class="form-group">
            <label for="pwd">Origin:</label>
            <input type="text" class="form-control" id="origin" placeholder="Enter origin" name="origin" value="{{ $dogCategory->origin }}">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection