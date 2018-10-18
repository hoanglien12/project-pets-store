@extends('admin.layouts.master')
@section('title','Dog Categories')
@section('content')

    <div class="portlet-body" style="border: 1px solid #ddd;
    border-radius: 4px; padding:10px; margin-bottom:10px;">
        <div class="table-toolbar">
            <form action="" method="GET" class="form-horizontal form-bordered" id="filter_box">
                <div class="row">
                    <!-- Filter Name -->
                    <div class="col-md-3">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Tên" class="form-control">
                        <div class="help-block">Tên</div>
                    </div>
                    <!-- Filter Origin -->
                    <div class="col-md-3">
                        <input type="text" name="origin" value="" placeholder="Tên" class="form-control">
                        <div class="help-block">Nguồn gốc</div>
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
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
       @if(Session::has('alert-' . $msg))
      <div class="alert">
          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      </div>
        @endif
    @endforeach
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{ route('dog_category.add') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Add</button></a>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="table_id">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Origin</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($count_category > 0)
                            <!-- {{ $i = 1 }} -->
                            @foreach($dogCategories as $c)
                            <!-- BEGIN MODAL CONFIRM DELETE ITEM -->
                            <div class="modal fade" id="delete{{$c->id}}" tabindex="-1" role="basic" aria-hidden="true" style="display: none;" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title text-center">Confirm delete </h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete : {{$c->name}} ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('dog_category.delete',$c->id) }}" method="POST">
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
                            <!-- END MODAL -->
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->description }}</td>
                                    <td>{{ $c->origin }}</td>
                                    <td>{{ $c->created_at }}</td>
                                    <td>{{ $c->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('dog_category.edit', ['id' => $c->id]) }}"><button class="btn btn-success">Edit</button></a>
                                    </td>
                                    <td>
                                        <a class="btn-xs" data-toggle="modal" href="#delete{{$c->id}}" data-toggle="tooltip" title="Delete"><button class="btn-danger btn"> Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" style="text-align: center" >No data</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <p>Total items: {{$count_category}}</p>

                    <div class="text-right">
                        {{ $dogCategories->links() }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    

    <div class="text-right">
    </div>
@endsection
<script>

</script>
