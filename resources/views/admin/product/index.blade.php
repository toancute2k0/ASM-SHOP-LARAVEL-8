@extends('layouts.admin') @section('title', 'Sản Phẩm') @section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div class="form-group d-flex">
            <h2>Sản Phẩm</h2>
            <a class="" href="{{route('product.create')}}">
                <i class="fas fa-plus-circle btn-primary btn-sm mt-1 ml-3"></i>
            </a>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá SP/Sale(Vnđ)</th>
                    <th>Ngày tạo</th>
                    <th class="text-center">Hình ảnh</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prod as $prod)
                <tr>
                    <td scope="row">{{$prod->id}}</td>
                    <td>
                        {{$prod->name}}
                        @if ($prod->priority == 1)
                            <span class="btn btn-xs btn-danger">
                                <i class="fas fa-fire-alt"></i>
                            </span>
                        @endif
                    </td>
                    <td>{{$prod->cate->name}}</td>
                    <td>
                        {{number_format("$prod->price",0,",",".")}}/
                        @if ($prod->sale_price == 0)
                            <span class="badge badge-success" >
                                0
                            </span>
                        @else
                            <span class="badge badge-success" >
                                {{number_format("$prod->sale_price",0,",",".")}}
                            </span>
                        @endif
                    </td>
                    <td>{{$prod->created_at->format('m-d-Y')}}</td>
                    <td class="text-center">
                        <img src="{{url('uploads/products')}}/{{$prod->image}}" width="30" />
                    </td>
                    <td class="text-right">
                        @if ($prod->status == 0)
                            <span class="btn btn-xs btn-danger">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        @else
                            <span class="btn btn-xs btn-success">
                                <i class="fas fa-eye"></i>
                            </span>
                        @endif
                        <a
                            href="{{route('product.edit', $prod->id)}}"
                            class="btn btn-xs btn-dark"
                        >
                            <i class="fas fa-edit"></i>
                        </a>
                        <a
                            href="{{route('product.destroy', $prod->id)}}"
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
                alertify.error('Xoá Sản Phẩm Không Thành Công!');
            });
        });
</script>
@endsection
