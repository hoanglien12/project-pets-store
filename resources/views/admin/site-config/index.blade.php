@extends('admin.layouts.master')
@section('title','Site config')
@section('content')

    <div class="portlet-body" style="border: 1px solid #ddd;
    border-radius: 4px; padding:10px; margin-bottom:10px;">
        <div class="table-toolbar">
            <form action="" method="GET" class="form-horizontal form-bordered" id="filter_box">
                <div class="row">
                    <!-- Filter Name -->
                    <div class="col-md-3">
                        <input type="text" name="label" value="{{ old('label') }}" placeholder="Tên" class="form-control">
                        <div class="help-block">Nhãn</div>
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
                    <a href="{{ route('site_config.add') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Add</button></a>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Label</th>
                                <th>Type</th>
                                <th>Value</th>
                                <th>Created at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($configs as $config)
                            <!-- BEGIN MODAL CONFIRM DELETE ITEM -->
                            <div class="modal fade" id="delete{{$config->id}}" tabindex="-1" role="basic" aria-hidden="true" style="display: none;" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title text-center">Confirm delete </h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete : {{$config->label}} ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('site_config.delete',$config->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-danger btn-delete">Delete</button>
                                            </form>
                                            <button type="button" class="btn dark btn-outline" data-dismiss="modal"><i class="fa fa-remove"></i>Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            <!-- BEGIN MODAL -->
                            <div class="modal fade" id="value{{ $config->id }}" tabindex="-1" role="basic" aria-hidden="true" data-target="#value{{$config->id}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title text-center">Information</h4>
                                        </div>
                                        <div class="modal-body" style="word-wrap: break-word;">
                                            <p>{{$config->value}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- END MODAL -->
                            <tr>
                                <td>{{ $config->id }}</td>
                                <td>{{ $config->label }}</td>

                                <td>
                                    @if($config->type == 0)
                                    {{ "Chuỗi" }}
                                    @elseif($config->type == 1)
                                    {{ "Số" }}
                                    @else
                                    {{"JSON"}}
                                    @endif
                                </td>
                                <td>
                                    <a class="btn-xs" data-toggle="modal" href="#value{{ $config->id }}" title="Chi tiết"><button class="btn-info btn blue btn-outline" >Chi tiết</button></a>
                                </td>                                
                                <td>{{ $config->created_at }}</td>
                                <td>
                                        <a href="{{ route('site_config.edit', ['id' => $config->id]) }}"><button class="btn btn-success">Edit</button></a>
                                    </td>
                                    <td>
                                        <a class="btn-xs" data-toggle="modal" href="#delete{{$config->id}}" data-toggle="tooltip" title="Delete"><button class="btn-danger btn"> Delete</button></a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-right">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    

    <div class="text-right">
    </div>
@endsection

