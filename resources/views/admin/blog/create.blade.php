@extends('layouts.admin') @section('title', 'Thêm Dài Viết') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Thêm Dài Viết</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dài Viết</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<div class="card">
    <div class="card-body">
        <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Tiêu Đề Bài Viết</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            aria-describedby="helpId"
                            id="title"
                            onkeyup="ChangeToSlug();"
                        />
                        @error('name')
                        <small id="helpId" class="text-muted"
                            >{{$message}}</small
                        >
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Url</label>
                        <input
                            type="text"
                            name="slug"
                            id="slug"
                            class="form-control"
                            aria-describedby="helpId"
                        />
                        @error('slug')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tóm tắc bài viết</label>
                        <input
                            type="text"
                            name="summary"
                            class="form-control"
                            aria-describedby="helpId"
                        />
                        @error('summary')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết bài viết</label>
                        <textarea
                            class="form-control"
                            name="description"
                            id="summernote"
                        ></textarea>
                        @error('description')
                        <small id="helpId" class="text-muted"
                            >{{$message}}</small
                        >
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Danh Mục</label>
                        <select class="form-control" name="category_id" >
                            <option value="">--SELECT ONE--</option>
                            {{-- @foreach ($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach --}}
                        </select>
                        @error('category_id')
                        <small id="helpId" class="text-muted"
                            >{{$message}}</small
                        >
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh Đại Diện</label>
                        <div class="custom-file">
                            <input type="file" name="image" id="files" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <img id="image" class="rounded" style="width:100%">
                        @error('image')
                        <small id="helpId" class="text-muted"
                            >{{$message}}</small
                        >
                        @enderror
                    </div>
                    <div class="form-group d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary">Thêm Mới</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('css')
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('backend/plugins/summernote/summernote-bs4.min.css')}}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection
@section('js')
    <!-- Summernote -->
    <script src="{{url('backend/dist/js/slug.js')}}"></script>
    <script src="{{url('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote({
                height:200,
                placeholder: "Chi tiết bài viết"
            });
        });
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        //show image
        document.getElementById("files").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("image").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>
@endsection
