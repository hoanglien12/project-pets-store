@extends('admin.layouts.master')
@section('title','Orders')
@section('content')
<div class="portlet-body" style="border: 1px solid #ddd;
    border-radius: 4px; padding:10px; margin-bottom:10px;">
        <div class="table-toolbar">
            <form action="" method="GET" class="form-horizontal form-bordered" id="filter_box">
                <div class="row">
                    <!-- Filter Name -->
                    <div class="col-md-3">
                        <input type="text" name="ID" value="{{ old('name') }}" placeholder="ID" class="form-control">
                        <div class="help-block">ID</div>
                    </div>
                    <!-- Filter Date -->
                    <div class="col-md-4">
                        <div class="input-group input-large date-picker input-daterange">
                            <input value="{{old('begin_date')}}" readonly name="begin_date" placeholder="Begin" data-toggle="datepicker" data-provide="datepicker" type="text" class="form-control">
                            <span class="input-group-addon"> To </span>
                            <input value="{{old('end_date')}}" name="end_date" data-toggle="datepicker" readonly placeholder="End" type="text" class="form-control">
                        </div>
                        <div class="help-block">Created date</div>
                    </div>
                    <!-- Search Submit -->
                    <div class="col-md-1">
                        <input type="submit" name="search" class="btn blue-steel" value="Search" />
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
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Date</th>
                  <th>Detail</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection