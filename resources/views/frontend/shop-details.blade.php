@extends('layouts.client')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{url('client/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Vegetable’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Vegetables</a>
                            <span>{{$product_detail->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{url('uploads/products')}}/{{$product_detail->image}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach ($product_detail -> images as $img)
                                <img
                                data-imgbigurl="{{url('uploads/product_details')}}/{{$img->image_details}}"
                                src="{{url('uploads/product_details')}}/{{$img->image_details}}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$product_detail->name}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(Chưa có nhận xét)</span>
                        </div>
                        <div class="product__details__price">
                            @if (isset($product_detail->sale_price))
                                {{number_format("$product_detail->sale_price",0,",",".")}}đ
                                <span class="number_sale_price_details">
                                    {{number_format("$product_detail->price",0,",",".")}}đ
                                </span>
                            @else
                                {{number_format("$product_detail->price",0,",",".")}}đ
                            @endif
                        </div>
                        <p>
                            <ul>
                                <li><b>Tình trạng</b> <span>Còn hàng</span></li>
                                <li><b>Giao hàng</b> <span>Vận chuyển 1 ngày. <samp> Miễn phí ngay hôm nay</samp></span></li>
                                <li><b>Đơn vị</b> <span>kg</span></li>
                                <li><b>Share on</b>
                                    <div class="share">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </p>
                        <form action="{{route('add.to.cart', $product_detail->id)}}" method="get">
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="quantity">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="primary-btn" value="ADD TO CARD">
                            <a href="#" class="heart-icon">
                                <span class="icon_heart_alt"></span>
                            </a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Mô tả chi tiết</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Nhận xét <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    {!!$product_detail->description!!}
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Chưa có nhận xét nào hết á hihi</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản Phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($same_product as $shop)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{url('uploads/products')}}/{{$shop->image}}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="{{route('add.to.cart', $shop->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
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
        </div>
    </section>
    <!-- Related Product Section End -->

@endsection