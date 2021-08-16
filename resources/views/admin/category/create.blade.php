@extends('layouts.admin') @section('title', 'Thêm Danh Mục')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm Danh Mục</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
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
                <form action="{{route('category.store')}}" method="post" role="form" enctype="multipart/form-data"> @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Tên danh mục</label>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    id="title"
                                    onkeyup="ChangeToSlug();"
                                    aria-describedby="helpId"
                                />
                                @error('name')
                                    <small id="helpId" class="text-muted">{{$message}}</small>
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
                                <button type="submit" class="btn btn-block btn-dark rounded-0">CẬP NHẬT</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Hình Ảnh</label>
                                <div class="custom-file">
                                    <input type="file" name="image_category" id="files" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <img id="image" class="rounded" style="width:100%">
                                @error('image_category')
                                <small id="helpId" class="text-muted"
                                    >{{$message}}</small
                                >
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>
@endsection
@section('js')
    <script src="{{url('backend/dist/js/slug.js')}}"></script>
    <script>
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
