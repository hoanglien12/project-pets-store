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
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label>Photos</label>
            <input type="file" name="photos[]" class="form-control" multiple id="photos">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" name="price">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $("#photos").on("change", function(e) {
                var files = e.target.files,
                filesLength = files.length;
                for (var i = 0; i < filesLength; i++) { 
                    var f=files[i] 
                    var fileReader=new FileReader(); 
                    fileReader.onload=(function(e) { 
                        var file=e.target; 
                        $("<span class=\"pip\">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\" />" +
                        "<br /><span class=\"remove\">X</span>" +
                        "</span>").insertAfter("#photos");
                    // $(".remove").click(function(){
                    // $(this).parent(".pip").remove();
                    // });
                        $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                            $('#photos').val("");
                        });

                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });
</script>
<style>
input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 100px;
  max-width: 140px;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
    display: block;
    color: white;
    text-align: right;
    cursor: pointer;
    margin-top: -80px;
    margin-bottom: 50px;
}
.remove:hover {
  background: white;
  color: black;
}
</style>