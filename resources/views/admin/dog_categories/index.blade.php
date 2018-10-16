@extends('cms.master')
@section('title','Admin Dog Categories')
@section('content')

    <h2>Dog Categories</h2>

    <div class="portlet-body">
        <div class="table-toolbar">
            <form action="" method="GET" class="form-horizontal form-bordered" id="filter_box">
                <div class="row">
                    <!-- Filter Name -->
                    <div class="col-md-3">
                        <input type="text" name="name" value="" placeholder="Tên" class="form-control">
                        <div class="help-block">Tên</div>
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
    <a href="{{ route('dog_category.create') }}">Add Category</a>
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
       @if(Session::has('alert-' . $msg))
      <div class="alert">
          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      </div>
        @endif
    @endforeach
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if($count_category > 0)
        @foreach ($dogCategories as $dogCategory)
        <!-- BEGIN MODAL CONFIRM DELETE ITEM -->
            <div class="modal fade" id="delete{{$dogCategory->id}}" tabindex="-1" role="basic" aria-hidden="true" style="display: none;" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title text-center">Confirm delete </h4>
                        </div>
                        <div class="modal-body">
                            Are you sure to delete : {{$dogCategory->name}} ?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('dog_category.delete',$dogCategory->id) }}" method="POST">
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
                <td>{{ $dogCategory->id }}</td>
                <td>{{ $dogCategory->name }}</td>
                <td>{{ $dogCategory->description }}</td>
                <td>{{ date('d-m-Y', strtotime($dogCategory->created_at)) }}</td>
                <td>
                    <a href="{{ route('dog_category.edit',[$dogCategory->id])}}" >
                    <button class="btn btn-block">Edit</button>
                    </a>
                </td>
                <td>
                    
                        <a class="btn-xs" data-toggle="modal" href="#delete{{$dogCategory->id}}" data-toggle="tooltip" title="Delete"><button class="btn-danger btn-delete"> <i class="glyphicon glyphicon-trash"></i> Delete</button></a>
                    
                    
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
@endsection
<script>

</script>
