@extends('layouts.client') @section('title', 'Đặt Hàng') @section('css')
    <style>
        .text-muted {
            color: red !important;
        }
    </style>
@endsection
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{url('client/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Chi Tiết Đơn Hàng</h4>
                <form action="{{route('checkout')}}" method="POST"> @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <p>Họ và Tên<span>*</span></p>
                                <input type="text" name="name" value="{{Auth::user()->name}}">
                                @error('name')
                                <small id="helpId" class="text-muted">
                                        {{$message}}
                                </small>
                            @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" placeholder="Địa chỉ cụ thể" class="checkout__input__add" name="address" value="{{Auth::user()->address}}">
                                @error('address')
                                <small id="helpId" class="text-muted">
                                        {{$message}}
                                </small>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số Điện Thoại<span>*</span></p>
                                        <input type="number" name="phone" value="{{Auth::user()->phone}}">
                                        @error('phone')
                                        <small id="helpId" class="text-muted">
                                                {{$message}}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" value="{{Auth::user()->email}}">
                                        @error('email')
                                        <small id="helpId" class="text-muted">
                                                {{$message}}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Ghi chú<span></span></p>
                                <input type="text" name="note"
                                    placeholder="ghi chú thêm...">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                                <ul>
                                    @php $total = 0 @endphp
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            @php $total += $details['price'] * $details['quantity'] @endphp
                                            <li style="border-bottom: solid 1px #c6c6c6;">
                                                <div class="row">
                                                    <div class="col-md-8 d-flex">
                                                        <img src="{{url('uploads/products')}}/{{ $details['image'] }}" width="50">
                                                        <p class="cart_detail_quantity">
                                                            x {{$details['quantity']}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span>
                                                            {{number_format($details['price'] * $details['quantity'],0,",",".")}}đ
                                                        </span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p class="cart_detail_name">
                                                            {{$details['name']}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                <div class="checkout__order__total">
                                    Tổng Đơn Hàng
                                    <input type="number" hidden value="{{$total}}" name="total">
                                    <span>
                                        {{number_format("$total",0,",",".")}}đ
                                    </span>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="acc-or" style="padding: 0;">
                                        Phương thức thanh toán?
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox row">
                                    <select name="payment" class="form-select mb-3 col-md-11 centered col-11">
                                        <option value="">--Chọn Phương Thức--</option>
                                        <option value="0">Thanh Toán Khi Nhận Hàng</option>
                                        <option value="1">Paypal/Mastercard</option>
                                    </select>
                                    @error('payment')
                                        <small id="helpId" class="text-muted">
                                                {{$message}}
                                        </small>
                                    @enderror
                                </div>
                                <button type="submit" class="site-btn">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

@endsection
