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

            .form-steps {
                display: block;
                width: 100%;
                position: relative;
                margin: 40px 0;
            }
            .form-steps:after {
                content: "";
                display: table;
                clear: both;
            }
            .form-steps__item {
                padding: 0;
                position: relative;
                display: block;
                float: left;
                width: 25%;
                text-align: center;
            }
            .form-steps__item-content {
                display: inline-block;
            }
            .form-steps__item-icon {
                background: #eceff1;
                color: #8191ab;
                display: block;
                border-radius: 100%;
                text-align: center;
                width: 25px;
                height: 25px;
                line-height: 25px;
                margin: 0 auto 10px auto;
                position: relative;
                font-size: 13px;
                font-weight: 700;
                z-index: 2;
            }
            .form-steps__item-text {
                font-size: 13px;
                color: #8191ab;
                font-weight: 500;
            }
            .form-steps__item-line {
                display: inline-block;
                height: 3px;
                width: 100%;
                background: #cfd8dc;
                float: left;
                position: absolute;
                left: -50%;
                top: 12px;
                z-index: 1;
            }
            .form-steps__item--active .form-steps__item-icon {
                background: #00aeef;
                color: #fff;
            }
            .form-steps__item--active .form-steps__item-text {
                color: #4f5e77;
            }
            .form-steps__item--active .form-steps__item-line {
                background: #00aeef;
            }
            .form-steps__item--completed .form-steps__item-text {
                color: #4f5e77;
            }
            .form-steps__item--completed .form-steps__item-icon {
                background: #00aeef;
                background-image: url(data:image/svg+xml;base64,PHN2ZyBkYXRhLW5hbWU9IkxheWVyIDEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmlld0JveD0iMCAwIDkuMTIgNyI+PHBhdGggZmlsbD0iI2ZmZiIgZD0iTTkuMTIgMS4wNkw4LjA2IDAgMy4xOCA0Ljg4IDEuMDYgMi43NiAwIDMuODIgMy4xOCA3bDUuOTQtNS45NHoiLz48L3N2Zz4=);
                color: transparent;
                background-size: 10px;
                background-repeat: no-repeat;
                background-position: center center;
                width: 25px;
                height: 25px;
                line-height: 25px;
            }
            .form-steps__item--completed .form-steps__item-line {
                background: #00aeef;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <table width="100%">
                <tr>
                    <td width="75px"><div class="logotype">OGANI</div></td>
                    <td
                        width="300px"
                        style="
                            background: #1b6535;
                            border-left: 15px solid #fff;
                            padding-left: 10px;
                            font-size: 26px;
                            color: #fff;
                        "
                    >
                        Đặt Hàng Thành Công
                    </td>
                    <td></td>
                </tr>
            </table>
            <h3>Thông tin đặt hàng</h3>
            <table width="100%" style="border-collapse: collapse">
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
                        @if ($order->payment == 0) Thanh toán khi nhận hàng
                        @else Thanh toán Paypal/MasterCard @endif
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
            <h3>Trạng thái đơn hàng</h3>
            @if ($order->status == 0)
                <nav class="form-steps">
                    <div class="form-steps__item form-steps__item--completed">
                        <div class="form-steps__item-content">
                            <span class="form-steps__item-icon">1</span>
                            <span class="form-steps__item-text"
                                >Đặt hàng thành công</span
                            >
                        </div>
                    </div>
                    <div class="form-steps__item form-steps__item--active">
                        <div class="form-steps__item-content">
                            <span class="form-steps__item-icon">2</span>
                            <span class="form-steps__item-line"></span>
                            <span class="form-steps__item-text">Đang xử lí</span>
                        </div>
                    </div>
                    <div class="form-steps__item">
                        <div class="form-steps__item-content">
                            <span class="form-steps__item-icon">3</span>
                            <span class="form-steps__item-line"></span>
                            <span class="form-steps__item-text"
                                >Đang Giao Hàng</span
                            >
                        </div>
                    </div>
                    <div class="form-steps__item">
                        <div class="form-steps__item-content">
                            <span class="form-steps__item-icon">4</span>
                            <span class="form-steps__item-line"></span>
                            <span class="form-steps__item-text"
                                >Đặt Hàng Thành Công</span
                            >
                        </div>
                    </div>
                </nav>
            @endif
            @if ($order->status == 1)
                <nav class="form-steps">
                    <div class="form-steps__item form-steps__item--completed">
                        <div class="form-steps__item-content">
                            <span class="form-steps__item-icon">1</span>
                            <span class="form-steps__item-text"
                                >Đặt hàng thành công</span
                            >
                        </div>
                    </div>
                    <div class="form-steps__item form-steps__item--completed">
                        <div class="form-steps__item-content">
                            <span class="form-steps__item-icon">2</span>
                            <span class="form-steps__item-line"></span>
                            <span class="form-steps__item-text">Đang xử lí</span>
                        </div>
                    </div>
                    <div class="form-steps__item form-steps__item--active">
                        <div class="form-steps__item-content">
                            <span class="form-steps__item-icon">3</span>
                            <span class="form-steps__item-line"></span>
                            <span class="form-steps__item-text"
                                >Đang Giao Hàng</span
                            >
                        </div>
                    </div>
                    <div class="form-steps__item">
                        <div class="form-steps__item-content">
                            <span class="form-steps__item-icon">4</span>
                            <span class="form-steps__item-line"></span>
                            <span class="form-steps__item-text"
                                >Đặt Hàng Thành Công</span
                            >
                        </div>
                    </div>
                </nav>
            @endif
            @if ($order->status == 2)
                <nav class="form-steps">
                    <div class="form-steps__item form-steps__item--completed">
                        <div class="form-steps__item-content">
                            <span class="form-steps__item-icon">1</span>
                            <span class="form-steps__item-text"
                                >Đặt hàng thành công</span
                            >
                        </div>
                    </div>
                    <div class="form-steps__item form-steps__item--completed">
                        <div class="form-steps__item-content">
                            <span class="form-steps__item-icon">2</span>
                            <span class="form-steps__item-line"></span>
                            <span class="form-steps__item-text">Đang xử lí</span>
                        </div>
                    </div>
                    <div class="form-steps__item form-steps__item--completed">
                        <div class="form-steps__item-content">
                            <span class="form-steps__item-icon">3</span>
                            <span class="form-steps__item-line"></span>
                            <span class="form-steps__item-text"
                                >Đang Giao Hàng</span
                            >
                        </div>
                    </div>
                    <div class="form-steps__item form-steps__item--active">
                        <div class="form-steps__item-content">
                            <span class="form-steps__item-icon">4</span>
                            <span class="form-steps__item-line"></span>
                            <span class="form-steps__item-text"
                                >Đặt Hàng Thành Công</span
                            >
                        </div>
                    </div>
                </nav>
            @endif
            @if ($order->status == 3)
                <nav class="form-steps">
                    <div class="form-steps__item form-steps__item--completed">
                        <div class="form-steps__item-content">
                            <span
                                class="form-steps__item-icon"
                                style="background: red"
                                >1</span
                            >
                            <span class="form-steps__item-text"
                                >Đặt hàng thành công</span
                            >
                        </div>
                    </div>
                    <div class="form-steps__item form-steps__item--completed">
                        <div class="form-steps__item-content">
                            <span
                                class="form-steps__item-icon"
                                style="background: red"
                                >2</span
                            >
                            <span
                                class="form-steps__item-line"
                                style="background: red"
                            ></span>
                        </div>
                    </div>
                    <div class="form-steps__item form-steps__item--completed">
                        <div class="form-steps__item-content">
                            <span
                                class="form-steps__item-icon"
                                style="background: red"
                                >3</span
                            >
                            <span
                                class="form-steps__item-line"
                                style="background: red"
                            ></span>
                        </div>
                    </div>
                    <div class="form-steps__item form-steps__item--completed">
                        <div class="form-steps__item-content">
                            <span
                                class="form-steps__item-icon"
                                style="background: red"
                                >4</span
                            >
                            <span
                                class="form-steps__item-line"
                                style="background: red"
                            ></span>
                            <span class="form-steps__item-text"
                                >Đã Huỷ Đơn Hàng</span
                            >
                        </div>
                    </div>
                </nav>
            @endif
            <h3>Hoá đơn</h3>
            <table class="TableData">
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Đơn giá</th>
                    <th>SL</th>
                    <th>Thành tiền</th>
                </tr>
                @php $count = 1 @endphp @foreach ($cart_item as $details)
                <tr>
                    <td class="cotSTT">{{$count}}</td>
                    <td class="cotTenSanPham">{{$details->detail_product->name}}</td>
                    <td class="cotGia">
                        {{number_format($details['price'],0,",",".")}}đ
                    </td>
                    <td class="cotSoLuong" align="center">
                        {{$details->quantity}}
                    </td>
                    <td class="cotSo">
                        {{number_format($details['price'] *
                        $details['quantity'],0,",",".")}}đ
                    </td>
                </tr>
                @php $count++ @endphp @endforeach
                <tr>
                    <td colspan="4" class="tong">Tổng cộng</td>
                    <td class="cotSo">
                        {{number_format($order->order_total,0,",",".")}}đ
                    </td>
                </tr>
            </table>
            <div class="alert">
                Dear, <span style="color: #380bff">{{$order->name}}</span>
                <br />
                Đơn hàng của bạn
                @if ($order->status == 0)
                    <span style="color: #380bff"> đang chờ được xử lí</span>
                @endif
                @if ($order->status == 1)
                    <span style="color: #380bff"> đang được vận chuyển</span>
                @endif
                @if ($order->status == 2)
                    <span style="color: #380bff"> đã giao thành công</span>
                @endif
                @if ($order->status == 3)
                    <span style="color: #380bff"> đã bị huỷ</span>
                @endif
                , tình trạng giao nhận
                hàng sẽ được cập nhật qua email
                <span style="color: #380bff"> {{$order->email}} </span> cho quý
                khách sớm nhất có thể. Cảm ơn bạn đẽ ghé cửa hàng chúng tôi!
            </div>
        </div>
        <!-- container -->
    </body>
</html>
