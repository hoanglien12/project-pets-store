@extends('admin.layouts.master')
@section('title','Product Category')
@section('content')
    @include('admin.layouts.success')
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
                </div>
                <div class="pagination" style="padding-left: 300px;">
                    <p>{{ $cate->links() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection