@extends('layouts.admin') @section('title', 'Bài viết') @section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div class="form-group d-flex">
            <h2>Bài viết</h2>
            <a class="" href="{{route('blog.create')}}">
                <i class="fas fa-plus-circle btn-primary btn-sm mt-1 ml-3"></i>
            </a>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề bài viết</th>
                    <th>Sơ lượt bài viết</th>
                    <th>Ngày tạo</th>
                    <th class="text-center">Hình ảnh</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blog as $blog)
                <tr>
                    <td scope="row">{{$blog->id}}</td>
                    <td>
                        {{$blog->name}}
                    </td>
                    <td>{{$blog->summary}}</td>
                    <td>{{$blog->created_at->format('d-m-Y')}}</td>
                    <td class="text-center">
                        <img src="{{url('uploads/blog')}}/{{$blog->image}}" width="30" />
                    </td>
                    <td class="text-right">
                        @if ($blog->status == 0)
                            <span class="btn btn-xs btn-danger">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        @else
                            <span class="btn btn-xs btn-success">
                                <i class="fas fa-eye"></i>
                            </span>
                        @endif
                        <a
                            href="{{route('blog.edit', $blog->id)}}"
                            class="btn btn-xs btn-dark"
                        >
                            <i class="fas fa-edit"></i>
                        </a>
                        <a
                            href="{{route('blog.destroy', $blog->id)}}"
                            class="btn btn-xs btn-danger btn_delete"
                        >
                            {{-- truyền biến btn_delete --}}
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- viết chức nănng xoá all --}}
        <form method="POST" action="" id="form-delete">
            @csrf @method('DELETE')
        </form>
    </div>
    <!-- /.card-body -->
</div>
@endsection
@section('css')
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
@endsection
@section('js')
<script>
    $(".btn_delete").click(function (ev) {
        ev.preventDefault(); //không cho load lại page
        var _href = $(this).attr("href"); //lấy địa chỉ
        $("form#form-delete").attr("action", _href);
        // if (confirm("Bạn có thực sự nỡ xoá nó không ?")) {
        //     $("form#form-delete").submit();
        // }
        alertify.confirm("Thông báo nè ^--^ ","Bạn có thực sự nỡ xoá nó không ?",
            function(){
                // alertify.success('Ok');
                $("form#form-delete").submit();
            },
            function(){
                alertify.error('Xoá Không Thành Công!');
            });
        });
</script>
@endsection
