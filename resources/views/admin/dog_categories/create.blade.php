@extends('cms.master')
@section('title','Dog Categories')
@section('content')
    <h2>Add Dog Categories</h2>
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
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection
