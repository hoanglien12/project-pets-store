@extends('admin.layouts.master')
@section('title','Dogs')
@section('content')

    <h2>Add Dog</h2>
    @include('admin.layouts.flash-msg')
    <form action="{{ route('dog.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <label for="category">Dog Category</label>
            <select name="category_id" id="category" class="form-control">
                @foreach($dog_category as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" onkeyup="ChangeToSlug();">
        </div>
        <div class="form-group">
            <label>Slugs</label>
            <input name="slugs" value="{{ old('slug') }}" placeholder="Slugs" id="slug" type="text" readonly class="form-control" >
        </div>
         <div class="form-group">
            <label class="control-label">Ảnh</label>
            <div class="">
                <div style="height: 32px;">
                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-on bootstrap-switch-id-check_upload bootstrap-switch-animate" style="width: 204px;">
                        <div class="bootstrap-switch-container" style="width: 303px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 101px;">Upload Ảnh</span><span class="bootstrap-switch-label" style="width: 101px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 101px;">Link Ảnh</span><input checked="" id="check_upload" name="check_upload" type="checkbox" class="make-switch" data-on-text="Upload Ảnh" data-off-text="Link Ảnh" data-check-upload="1" "=""></div></div>
                </div>
                <p class=" help-block">Hình thức upload</p>
            </div>
            <div id="select_image_to_upload" class="col-md-offset-3">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                        <span class="btn green btn-file" id="img">
                            <span class="fileinput-new"> Select file </span>
                            <input type="file" name="photos[]" id="photos" multiple >
                        </span>
                    </div>
                </div>
            </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>
        <div class="form-group">
            <label for="sale">Sale:</label>
            <input type="text" class="form-control" id="sale" name="sale">
        </div>
        <div class="form-group">
            <label for="pwd">Infomation:</label>
            <div class="input-group input-large date-picker input-daterange">
                <div class="col-md-3">
                    <input type="text" class="form-control" id="height" name="height" placeholder="height:centimet">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="weight" name="weight" placeholder="weight:kilogram">
                </div>
                <div class="col-md-3">
                    <div class="input-group input-large date-picker input-daterange">
                        <input value="{{old('birthday')}}" name="birthday" placeholder="birthday" data-toggle="datepicker" data-provide="datepicker" type="text" class="form-control">
                    </div>
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <label for="pwd">Description:</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection
