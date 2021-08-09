@extends('layouts.admin') @section('title', 'Chi tiết đơn hàng') @section('content') @section('css')

@endsection
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Chi tiết đơn hàng #{{$order->id}}</h1>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<div class="card">
    <div class="card-body" style="padding: 10px !important;">
        <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th colspan="6" class="text-center" style="background: #bec9c9;">
                    Thông Tin Vận Chuyển
                </th>
            </tr>
            <tr style="font-weight: bold">
                <td>Tên Người Nhận</td>
                <td>Địa Chỉ</td>
                <td>Số điện thoại</td>
                <td>Email</td>
                <td>Ghi chú</td>
                <td>Hình thức thanh toán</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td >{{$order->name}}</td>
                <td >{{$order->address}}</td>
                <td >{{$order->phone}}</td>
                <td >{{$order->email}}</td>
                <td >{{$order->note}}</td>
                <td >
                    @if ($order->payment == 0)
                        Thanh toán khi nhận hàng
                    @else
                        Thanh toán Paypal/Mastercard
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    </div>
</div>
<div class="card">
    <div class="card-body" style="padding: 10px !important;">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th colspan="6" class="text-center" style="background: #bec9c9;">
                        Liệt kê chi tiết đơn hàng
                    </th>
                </tr>
                <tr style="font-weight: bold">
                    <td>STT</td>
                    <td>Tên sản phẩm</td>
                    <td>Số lượng</td>
                    <td>Giá SP</td>
                    <td>Tổng tiền</td>
                </tr>
                </thead>
            <tbody>
                <?php $count = 0; ?>
                    @foreach ($order_detail as $item)
                    <tr>
                        <td >{{ $count = $count + 1 }}</td>
                        <td >{{$item->detail_product->name}}</td>
                        <td >{{$item->quantity}}</td>
                        <td >
                            {{number_format($item['price'],0,",",".")}} VNĐ
                        </td>
                        <td >
                            {{number_format($item['price'] * $item['quantity'],0,",",".")}} VNĐ
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Tổng Thanh Toán</th>
                    <th>
                        {{number_format($order->order_total,0,",",".")}} VNĐ
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Cập nhật đơn hàng</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="{{route('order.update', $order->id)}}" method="post">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="status">Trạng thái đơn hàng</label>
                <select name="status" class="form-control rounded-0" required>
                    <option value="0" {{ $order->status == '0' ? 'selected' : ''}}>
                        Đang xử lí
                    </option>
                    <option value="1" {{ $order->status == '1' ? 'selected' : ''}}>
                        Đang giao hàng
                    </option>
                    <option value="2" {{ $order->status == '2' ? 'selected' : ''}}>
                        Giao hàng thành công
                    </option>
                    <option value="3" {{ $order->status == '3' ? 'selected' : ''}}>
                        Đã huỷ đơn hàng
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-block btn-dark rounded-0">CẬP NHẬT</button>
        </form>


    </div>
    <!-- /.card-body -->
</div>

@endsection
