@extends('layouts.client')
@section('title', 'Sản Phẩm')
@section('css')
    <style>
    .sidebar__item ul li a {
        display:block;
    }
    .sidebar__item ul li a:hover {
        color:red;
    }

    .sidebar__item .active {
        color: red;
    }
    </style>
@endsection
@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="{{url('client/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <x-category/>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row d-flex flex-row-reverse">
                            <div class="col-lg-4 col-md-5">
                                <form action="" id="form-filter" method="get">
                                    <div class="filter__sort">
                                        <span>Sắp xếp</span>
                                        <select name="orderby" class="orderby">
                                            <option {{Request::get('orderby') == "price" || Request::get('orderby') ? "selected='selected'" : ""}} value="price" selected="selected">Mặc định</option>
                                            <option {{Request::get('orderby') == "gia-tang" ? "selected='selected'" : ""}} value="gia-tang">Giá tăng dần</option>
                                            <option {{Request::get('orderby') == "gia-giam" ? "selected='selected'" : ""}} value="gia-giam">Giá giảm dần</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($product_shop as $shop)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{url('uploads/products')}}/{{$shop->image}}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li>
                                                <a href="{{route('add.to.cart', $shop->id)}}">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="{{route('view',['slug'=>$shop->slug])}}">{{$shop->name}}</a></h6>
                                        <h5>{{number_format("$shop->price",0,",",".")}}đ</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="">
                        {{ $product_shop->appends(Request::query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

@endsection
@section('js')
    <script>
        $(function (){
            $('.orderby').change(function (){
                $("#form-filter").submit();
            })
        })
    </script>
@endsection