@extends('admin.layouts.master')
@section('title','Posts')
@section('content')
	<div class="portlet-body" style="border: 1px solid #ddd;
    border-radius: 4px; padding:10px; margin-bottom:10px;">
        <div class="table-toolbar">
            <form action="{{ route('post.index') }}" method="GET" class="form-horizontal form-bordered" id="filter_box">
                <div class="row">
                    <!-- Filter Name -->
                    <div class="col-md-3">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Tên" class="form-control">
                        <div class="help-block">Post's Name</div>
                    </div>
                    <!-- Filter Date -->
                    <div class="col-md-4">
                        <div class="input-group input-large date-picker input-daterange">
                            <input value="{{old('begin_date')}}" readonly name="begin_date" placeholder="Bắt đầu" data-toggle="datepicker" data-provide="datepicker" type="text" class="form-control">
                            <span class="input-group-addon"> đến </span>
                            <input value="{{old('end_date')}}" name="end_date" data-toggle="datepicker" readonly placeholder="Kết thúc" type="text" class="form-control">
                        </div>
                        <div class="help-block">Ngày tạo</div>
                    </div>
                    
                    <!-- Search Submit -->
                    <div class="col-md-1">
                        <input type="submit" name="search" class="btn blue-steel" value="Tìm kiếm" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('admin.layouts.flash-msg')
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{ route('post.add') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Add</button></a>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="table_id">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Show Slider</th>
                            <th>Date</th>
                            <th colspan="2">Action</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <input type="text" hidden value="{{$i=1}}">

                        </tbody>
                    </table>
                    <p>Total items: </p>

                </div>
            </div>
        </div>
    </div>

@endsection