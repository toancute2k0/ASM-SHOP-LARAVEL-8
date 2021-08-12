@extends('layouts.client') @section('title', 'Giỏ Hàng') @section('css')
<style>
    .nomargin {
        font-size: 16px;
    }
    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
    }

    table caption {
        font-size: 1.5em;
        margin: 0.5em 0 0.75em;
    }

    table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: 0.35em;
    }

    table th,
    table td {
        padding: 0.625em;
        text-align: center;
    }

    table th {
        font-size: 0.85em;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    @media screen and (max-width: 600px) {
        table {
            border: 0;
        }

        table caption {
            font-size: 1.3em;
        }

        table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: 0.625em;
        }

        table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: 0.8em;
            text-align: right;
        }

        table td::before {
            /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }

        table td:last-child {
            border-bottom: 0;
        }
    }

    /* general styling */
    body {
        font-family: "Open Sans", sans-serif;
        line-height: 1.25;
    }
</style>
@endsection @section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{url('client/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div id="loadcartajax" class="container">
        <div class="totalcartload">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table id="cart">
                            <thead>
                                <tr>
                                    <th style="width: 50%;" scope="col">Sản Phẩm</th>
                                    <th style="width: 10%;" scope="col">Giá</th>
                                    <th style="width: 10%;" scope="col">Số Lượng</th>
                                    <th style="width: 20%;" scope="col">Tổng</th>
                                    <th style="width: 10%;" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp @if(session('cart')) @foreach(session('cart') as $id => $details) @php $total += $details['price'] * $details['quantity'] @endphp
                                <tr data-id="{{$id}}">
                                    <td data-th="Product" data-label="Sản Phẩm">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{url('uploads/products')}}/{{ $details['image'] }}" width="100" />
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$details['name']}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Giá" data-th="Price">
                                        {{number_format($details['price'],0,",",".")}}đ
                                    </td>
                                    <td data-th="Quantity" data-label="Số Lượng">
                                        <input type="number" value="{{$details['quantity']}}" class="form-control quantity update-cart" />
                                    </td>
                                    <td id="update-cart" data-label="Tổng" data-th="Subtotal">
                                        {{number_format($details['price'] * $details['quantity'],0,",",".")}}đ
                                    </td>
                                    <td data-label="" data-th="" id="submit-form">
                                        <button type="submit" class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                @endforeach @else
                                <td colspan="5">
                                    <p>Không có sản phẩm nào</p>
                                </td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{url('/shop')}}" class="primary-btn cart-btn">
                            TIẾP TỤC MUA HÀNG
                        </a>
                        <button class="primary-btn cart-btn cart-btn-right remove-all-cart">XOÁ TẤT CẢ</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>MÃ GIẢM GIÁ</h5>
                            <form action="#">
                                <input disabled type="text" placeholder="Nhập mã giảm giá" />
                                <button disabled type="submit" class="site-btn">ÁP DỤNG</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Tổng đơn hàng</h5>
                        <ul>
                            <li>Tổng <span>{{number_format("$total",0,",",".")}}đ</span></li>
                        </ul>
                        <a href="{{route('checkout')}}" class="primary-btn">
                            TIẾP TỤC THANH TOÁN
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection @section('js')

<script type="text/javascript">

    $(".update-cart").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
                window.location.reload();
            }
        })
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

    $(".remove-all-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Bạn có muốn xoá tất cả sản phẩm trong giỏ hàng không?")) {
            $.ajax({
                url: '{{ route('remove.all.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>

@endsection
