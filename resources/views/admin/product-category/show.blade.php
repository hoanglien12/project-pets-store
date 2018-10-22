@extends('admin.layouts.master')
@section('title','Product Category')
@section('content')
    @include('admin.layouts.success')
    <div class="portlet-body" style="border: 1px solid #ddd; border-radius: 4px; padding:10px; margin-bottom:10px;">
        <div class="table-toolbar">
            <form action="" method="GET" class="form-horizontal form-bordered" id="filter_box">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="name" value="" placeholder="Name" class="form-control">
                        <div class="help-block">Name</div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-large date-picker input-daterange">
                            <input value="{{old('begin_date')}}" readonly name="begin_date" placeholder="Start" data-toggle="datepicker" data-provide="datepicker" type="text" class="form-control">
                            <span class="input-group-addon"> to </span>
                            <input value="{{old('end_date')}}" name="end_date" data-toggle="datepicker" readonly placeholder="End" type="text" class="form-control">
                        </div>
                        <div class="help-block">Created date</div>
                    </div>
                    <div class="col-md-1">
                        <input type="submit" name="search" class="btn btn-success" value="Tìm kiếm" />
                    </div>
                </div>
            </form>
        </div>
    </div>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                	<a href="{{ route('product_category.add') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Add</button></a>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($cate as $c)
	                            <tr>
	                                <td>{{ $c->id }}</td>
	                                <td>{{ $c->name }}</td>
	                                <td>{{ $c->description }}</td>
                                    <td>{{ $c->created_at }}</td>
                                    <td>{{ $c->updated_at }}</td>
	                                <td>
	                                	<a href="{{ route('product_category.edit', ['id' => $c->id]) }}"><button class="btn btn-success">Edit</button></a>
	                                	<a href="{{ route('product_category.delete', ['id' => $c->id]) }}" onclick="return confirm('Are you sure delete this product category?')"><button class="btn btn-danger">Delete</button></a>
	                                </td>
	                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>Total item: {{ $count_category }}</p>
                </div>
                <div class="pagination" style="padding-left: 300px;">
                    <p>{{ $cate->links() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection