@extends('admin.layouts.master')
@section('title','Add Posts')
@section('content')
    @include('admin.layouts.flash-msg')
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="col-md-3 control-label">Tên bài viết</label>
            <div class="col-md-8">
                <input name="name" placeholder="Nhập tên bài viết" type="text" class="form-control input_name" id="input_name">
                <p class="help-block">Tên bài viết - VD: Phản ứng của các sao bóng đá khi nhận được quà giáng sinh </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Tiêu đề bài viết</label>
            <div class="col-md-8">
                <input name="title" placeholder="Nhập tiêu đề bài viết" type="text" class="form-control">
                <p class="help-block">Tiêu đề bài viết - VD: Phản ứng của các sao bóng đá khi nhận được quà giáng sinh</p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Slugs</label>
            <div class="col-md-8">
                <input name="slugs" placeholder="Nhập slugs" id="slug" type="text" class="form-control">
                <p class="help-block">Slugs - VD: phan-ung-cua-cac-sao-bong-da-khi-nhan-duoc-qua-giang-sinh (Có thể không nhập!)</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Ảnh</label>
            <div class="col-md-9">
                <div style="height: 32px;">
                <input checked id="check_upload" name="check_upload" type="checkbox" class="make-switch" data-on-text="Upload Ảnh" data-off-text="Link Ảnh"  data-check-upload="1" ">
                </div>
                <p class="help-block">Hình thức upload</p>
            </div>
            <div id="select_image_to_upload" class="col-md-9 col-md-offset-3" >
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                        <span class="btn green btn-file">
                        <span class="fileinput-new"> Select file </span>
                        <span class="fileinput-exists"> Change </span>
                        <input type="file" name="photo"></span>
                        <span class="fileinput-filename"></span> &nbsp; <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"></a>
                    </div>
                </div>
            </div>

            <div id="paste_url_image" class="col-md-8 col-md-offset-3">
                <input name="url_image" placeholder="Nhập link ảnh" type="text" class="form-control">
                <p class="help-block">Link ảnh</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Tóm tắt</label>
            <div class="col-md-8">
                <textarea class="form-control" placeholder="Nhập tóm tắt bài viết" name="summary" rows="3"></textarea>

                <p class="help-block">Tóm tắt bài viết (Mặc định: Tên bài viết) - VD: Phản ứng của các sao bóng đá khi nhận được quà giáng sinh</p>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-3 control-label">Nội dung</label>
            <div class="col-md-8">
                <textarea class="ckeditor form-control" id="editor1" name="editor1" rows="6"></textarea>
                <script>initPosts();</script>
                <p class="help-block">Nội dung bài viết</p>
            </div>


        </div>
        <!-- Form action buttons -->
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" name="Create_new_Items"  id="Create_new_Items" class="btn green btn-outline">
                        <i class="fa fa-check"></i> Submit
                    </button>
                    <button type="reset" name="reset" class="btn default">Cancel</button>
                </div>
            </div>
        </div>
    </form>
@endsection