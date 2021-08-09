@extends('layouts.admin') @section('title', 'Đơn Hàng') @section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div class="form-group d-flex">
            <h2>Đơn Hàng</h2>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Địa Chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $order)
                <tr>
                    <td scope="row">{{$order->id}}</td>
                    <td>
                        {{$order->name}}
                    </td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->phone}}</td>
                    <td>
                        {{number_format("$order->order_total",0,",",".")}} VNĐ
                    </td>
                    <td>
                        @if ($order->status == 0)
                            <span class="badge badge-secondary" >
                                Đang xữ lí
                            </span>
                        @endif
                        @if ($order->status == 1)
                            <span class="badge badge-warning" >
                                Đang giao hàng
                            </span>
                        @endif
                        @if ($order->status == 2)
                            <span class="badge badge-success" >
                                Giao hàng thành công
                            </span>
                        @endif
                        @if ($order->status == 3)
                            <span class="badge badge-danger" >
                                Đã huỷ
                            </span>
                        @endif
                    </td>
                    <td class="text-right">
                        <a
                            href="{{route('order.edit', $order->id)}}"
                            class="btn btn-xs btn-dark"
                        >
                            <i class="fas fa-edit"></i>
                        </a>
                        <a
                            href="{{route('order.destroy', $order->id)}}"
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
                alertify.error('Xoá đơn hàng Không Thành Công!');
            });
        });
</script>
@endsection
