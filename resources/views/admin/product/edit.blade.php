@extends('layouts.admin') @section('title', 'Cập nhật sản phẩm') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cập nhật sản phẩm</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">sản phẩm</a></li>
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
        <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Tên Sản phẩm</label>
                        <input
                            type="text"
                            name="name"
                            value="{{$product->name}}"
                            id="title"
                            onkeyup="ChangeToSlug();"
                            class="form-control"
                            aria-describedby="helpId"
                        />
                        @error('name')
                        <small id="helpId" class="text-muted">
                                {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Url</label>
                        <input
                            type="text"
                            name="slug"
                            id="slug"
                            value="{{$product->slug}}"
                            class="form-control"
                            aria-describedby="helpId"
                        />
                        @error('slug')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nổi Bậc</label>
                                <select class="form-control" name="priority">
                                    <option value="0" {{ $product->priority == '0' ? 'selected' : ''}}>
                                        Không Nổi Bậc
                                    </option>
                                    <option value="1" {{ $product->priority == '1' ? 'selected' : ''}}>
                                        Nổi Bậc
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Trạng Thái</label>
                                <select class="form-control" name="status">
                                    <option value="0" {{ $product->status == '0' ? 'selected' : ''}}>
                                        Vô hiệu hoá
                                    </option>
                                    <option value="1" {{ $product->status == '1' ? 'selected' : ''}}>
                                        Hiển Thị
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea
                            class="form-control"
                            name="description"
                            id="summernote"
                        >{{$product->description}}</textarea>
                        @error('description')
                        <small id="helpId" class="text-muted">
                                {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Hình Ảnh Chi Tiết</label>
                        <input type="file" id="input-file-now-custom-3" class="form-control mb-1" name="image_detail[]" multiple>
                        @foreach ($product->images as $img)
                            <div class="image-area">
                                <a href="{{url('/admin/product/deleteimage/'.$img->id)}}" class="remove-image" style="display: inline">x</a>

                                <img src="{{url('uploads/product_details')}}/{{$img->image_details}}" alt="{{$img->id}}">
                            </div>
                        @endforeach
                        @error('image_details')
                            <small id="helpId" class="text-muted">
                                {{$message}}
                            </small>                            >
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Danh Mục</label>
                        <select class="form-control" name="category_id">
                            <option selected value="{{$product->category_id}}">{{$product->cate->name}}</option>
                            @foreach ($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small id="helpId" class="text-muted">
                                {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Giá SP</label>
                        <input
                            type="text"
                            name="price"
                            class="form-control"
                            value="{{$product->price}}"
                            aria-describedby="helpId"
                        />
                        @error('price')
                        <small id="helpId" class="text-muted">
                                {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Giá SP Sale</label>
                        <input
                            type="text"
                            name="sale_price"
                            class="form-control"
                            value="{{$product->sale_price}}"
                            aria-describedby="helpId"
                        />
                        @error('sale_price')
                        <small id="helpId" class="text-muted">
                                {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Hình Ảnh</label>
                        <div class="custom-file">
                            <input value="{{url('uploads/products')}}/{{$product->image}}"type="file" name="image" id="files" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <img id="image" src="{{url('uploads/products')}}/{{$product->image}}" class="rounded" style="width:100%">
                        @error('image')
                        <small id="helpId" class="text-muted">
                                {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
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
    <style>
        /* css ảnh image_details */
        a {
            text-decoration: none;
        }
        .image-area {
            position: relative;
            display: inline-block;
            margin: 10px 10px 0 0;
        }
        .image-area img {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }
        .remove-image {
            display: none;
            position: absolute;
            top: -10px;
            right: -10px;
            border-radius: 10em;
            padding: 2px 6px 3px;
            text-decoration: none;
            font: 700 16px/15px sans-serif;
            background: #555;
            border: 3px solid #fff;
            color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5),
                inset 0 2px 4px rgba(0, 0, 0, 0.3);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
            -webkit-transition: background 0.5s;
            transition: background 0.5s;
        }
        .remove-image:hover {
            background: #e54e4e;
            padding: 3px 7px 5px;
            top: -11px;
            right: -11px;
        }
        .remove-image:active {
            background: #e54e4e;
            top: -10px;
            right: -11px;
        }
    </style>
@endsection
@section('js')
    <script src="{{url('backend')}}/dist/js/slug.js"></script>
    <!-- Summernote -->
    <script src="{{url('backend')}}/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote({
                height:200,
                placeholder: "Mô tả chi tiết về sản phẩm"
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
