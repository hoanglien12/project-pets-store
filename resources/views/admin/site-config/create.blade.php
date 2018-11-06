@extends('admin.layouts.master')
@section('title','Add Site config')
@section('content')
    @include('admin.layouts.flash-msg')
    <form action="{{ route('site_config.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="label">Label:</label>
            <input type="text" class="form-control" id="name" name="label">
        </div>
        <div class="form-group">
            <label for="type">Type:</label>
            <select name="type" id="type" class="form-control">
                <option value="0">Chuỗi</option>
                <option value="1">Số</option>
                <option value="2">JSON</option>                
            </select>
        </div>
        <div class="form-group">
            <label for="value">Value:</label>
            <input type="text" class="form-control" id="value" name="value">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection
