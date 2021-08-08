@extends('layouts.admin') @section('title', 'Danh Mục Sản Phẩm')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group d-flex">
            <h2>Danh Mục</h2>
            <a class="" href="{{route('category.create')}}">
                <i class="fas fa-plus-circle btn-primary btn-sm mt-1 ml-3"></i>
            </a>
        </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Tổng sản phẩm</th>
                        {{-- <th>Trạng thái</th> --}}
                        <th>Ngày tạo</th>
                        <th class="text-center">Hình ảnh</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $cate)
                    <tr>
                        <td scope="row">{{$cate->id}}</td>
                        <td>{{$cate->name}}</td>
                        {{-- nếu ko có sp in ra 0 --}}
                        <td>{{$cate->product_cate->count()}}</td>
                        <td>{{$cate->created_at->format('m-d-Y')}}</td>
                        <td class="text-center">
                            <img src="{{url('public/uploads/category')}}/{{$cate->image_category}}" width="40" />
                        </td>
                        <td class="text-right">
                            @if ($cate->status == 0)
                                <span class="btn btn-sm btn-danger">
                                    <i class="fas fa-eye-slash"></i>
                                </span>
                            @else
                                <span class="btn btn-sm btn-success">
                                    <i class="fas fa-eye"></i>
                                </span>
                            @endif
                            <a href="{{route('category.edit', $cate->id)}}" class="btn btn-sm btn-dark">
                                    <i class="fas fa-edit"></i>
                                </a>
                            <a href="{{route('category.destroy', $cate->id)}}" class="btn btn-sm btn-danger btn_delete">
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
                alertify.error('Xoá Danh Mục Không Thành Công!');
            });
        });
    </script>
@endsection
