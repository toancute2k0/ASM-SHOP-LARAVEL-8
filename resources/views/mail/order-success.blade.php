<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap");
            body {
                margin: 0;
                padding: 0;
                background-color: #fafafa;
                font: 12pt;
                font-family: "Roboto", sans-serif;
            }
            * {
                box-sizing: border-box;
                -moz-box-sizing: border-box;
            }
            .container {
                max-width: 680px;
                margin: 0 auto;
            }
            .logotype {
                background: #1b6535;
                color: #fff;
                width: 75px;
                height: 75px;
                line-height: 75px;
                text-align: center;
                font-size: 20px;
            }
            .column-title {
                background: #eee;
                text-transform: uppercase;
                padding: 15px 5px 15px 15px;
                font-size: 11px;
            }
            .column-detail {
                border-top: 1px solid #eee;
                border-bottom: 1px solid #eee;
            }
            .column-header {
                background: #eee;
                text-transform: uppercase;
                padding: 15px;
                font-size: 11px;
                border-right: 1px solid #eee;
            }
            .row {
                padding: 7px 14px;
                border-left: 1px solid #eee;
                border-right: 1px solid #eee;
            }
            .alert {
                background: #ffd9e8;
                padding: 20px;
                margin: 20px 0;
                line-height: 22px;
                color: #333;
            }
            .socialmedia {
                background: #eee;
                padding: 20px;
                display: inline-block;
            }

            .TableData {
                background: #ffffff;
                font: 11px;
                width: 100%;
                border-collapse: collapse;

                font-size: 12px;
                border: thin solid #d3d3d3;
            }
            .TableData TH {
                background: rgba(0, 0, 255, 0.1);
                text-align: center;
                font-weight: bold;
                color: #000;
                border: solid 1px #ccc;
                height: 24px;
            }
            .TableData TR {
                height: 24px;
                border: thin solid #d3d3d3;
            }
            .TableData TR TD {
                padding-right: 2px;
                padding-left: 2px;
                border: thin solid #d3d3d3;
            }
            .TableData TR:hover {
                background: rgba(0, 0, 0, 0.05);
            }
            .TableData .cotSTT {
                text-align: center;
                width: 10%;
            }
            .TableData .cotTenSanPham {
                text-align: left;
                width: 40%;
            }
            .TableData .cotHangSanXuat {
                text-align: left;
                width: 20%;
            }
            .TableData .cotGia {
                text-align: right;
                width: 120px;
            }
            .TableData .cotSoLuong {
                text-align: center;
                width: 50px;
            }
            .TableData .cotSo {
                text-align: right;
                width: 120px;
            }
            .TableData .tong {
                text-align: right;
                font-weight: bold;
                text-transform: uppercase;
                padding-right: 4px;
            }
            .TableData .cotSoLuong input {
                text-align: center;
            }
            @media print {
                @page {
                    margin: 0;
                    border: initial;
                    border-radius: initial;
                    width: initial;
                    min-height: initial;
                    box-shadow: initial;
                    background: initial;
                    page-break-after: always;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <table width="100%">
                <tr>
                    <td width="75px"><div class="logotype">OGANI</div></td>
                    <td width="300px" style="background: #1b6535; border-left: 15px solid #fff; padding-left: 10px; font-size: 26px; color: #fff;">Đặt Hàng Thành Công</td>
                    <td></td>
                </tr>
            </table>
            <h3>Thông tin đặt hàng</h3>
            <table width="100%" style="border-collapse: collapse;">
                <tr>
                    <td width="180px" class="column-title">Họ và Tên</td>
                    <td></td>
                    <td class="column-detail">{{$order->name}}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="column-title">Email</td>
                    <td></td>
                    <td class="column-detail">{{$order->email}}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="column-title">Địa chỉ</td>
                    <td></td>
                    <td class="column-detail">{{$order->address}}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="column-title">Số điện thoại</td>
                    <td></td>
                    <td class="column-detail">{{$order->phone}}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="column-title">Phương Thức Thanh Toán</td>
                    <td></td>
                    <td class="column-detail">
                        @if ($order->payment == 0)
                            Thanh toán khi nhận hàng
                        @else
                            Thanh toán Paypal/MasterCard
                        @endif
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td class="column-title">Ngày đặt hàng</td>
                    <td></td>
                    <td class="column-detail">
                        {{$order->created_at->format('d-m-Y')}}
                    </td>
                    <td></td>
                </tr>
            </table>
            <h3>Hoá đơn</h3>
            <table class="TableData">
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Đơn giá</th>
                    <th>SL</th>
                    <th>Thành tiền</th>
                </tr>
                @php $count = 1 @endphp
                @foreach ($cart_item as $details)
                <tr>
                    <td class="cotSTT">{{$count}}</td>
                    <td class="cotTenSanPham">{{$details['name']}}</td>
                    <td class="cotGia">
                        {{number_format($details['price'],0,",",".")}}đ
                    </td>
                    <td class="cotSoLuong" align="center">
                        {{$details['quantity']}}
                    </td>
                    <td class="cotSo">
                        {{number_format($details['price'] * $details['quantity'],0,",",".")}}đ
                    </td>
                </tr>
                @php $count++ @endphp
                @endforeach
                <tr>
                    <td colspan="4" class="tong">Tổng cộng</td>
                    <td class="cotSo">
                        {{number_format($order->order_total,0,",",".")}}đ
                    </td>
                </tr>
            </table>
            <div class="alert">
                Dear, {{$order->name}}
                <br>
                Đơn hàng của bạn đang chờ được xác nhận, tình trạng giao nhận hàng sẽ được cập nhật qua email
                <span style="color: #380bff">
                    {{$order->email}}
                </span> cho quý khách sớm nhất có thể. Cảm ơn bạn đẽ ghé cửa hàng chúng tôi!
            </div>
        </div>
        <!-- container -->
    </body>
</html>
