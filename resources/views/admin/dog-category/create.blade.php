@extends('admin.layouts.master')
@section('title','Add Dog Categories')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('dog_category.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="pwd">Description:</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="form-group">
            <label for="pwd">Origin:</label>
            <input type="text" class="form-control" id="origin" name="origin">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection
