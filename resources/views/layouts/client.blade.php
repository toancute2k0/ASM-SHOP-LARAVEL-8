<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | @yield('title')</title>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{url('client/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('client/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('client/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('client/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('client/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('client/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('client/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('client/css/style.css')}}" type="text/css">
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- css main --}}
    @yield('css')
    <style>
        body {
                font-family: 'Poppins', sans-serif !important;
            }
        .header__top__right__language a {
            display: block;
            font-size: 14px;
            color: #1c1c1c;
        }
        .header__top__right__language a i {
            margin-right: 6px;
        }
        .header__top__right__language a:hover,
        .header__top__right__auth a:hover {
            color: red;
        }
        /* #nar_bar {
            background-color: #1b6535 !important;
        } */
    </style>
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{url('client/img/logo.png')}}" alt=""></a>
        </div>
        <div class="humberger__menu__cart" id="change-item-cart">
            @php $total = 0 @endphp
                    @foreach((array) session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
                <li><a href="{{route('home.cart')}}"><i class="fa fa-shopping-bag"></i>
                    <span id="total-quanty-show">{{ count((array) session('cart')) }}</span>
                </a></li>
            </ul>
            <div class="header__cart__price">
                Tổng: <span>{{number_format("$total",0,",",".")}}đ</span>
            </div>
        </div>
        <div class="humberger__menu__widget">
            @if (Auth::check())
                <div class="header__top__right__language">
                <a href="{{url('#')}}">{{ Auth::user()->name }}</a>
                </div>
                <div class="header__top__right__auth">
                    <a href="{{route('logout')}}" onclick="return confirm('Bạn có nỡ thoát sau ?')">Thoát</a>
                </div>
            @else
                <div class="header__top__right__language">
                <a href="{{url('/login')}}">Đăng Nhập</a>
                </div>
                <div class="header__top__right__auth">
                    <a href="{{url('/register')}}">Đăng Kí</a>
                </div>
            @endif
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{route('home.index')}}">Trang Chủ</a></li>
                <li><a href="{{route('home.shop')}}">Sản Phẩm</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{route('home.cart')}}">Giỏ Hàng</a></li>
                        <li><a href="{{route('checkout')}}">Thanh Toán</a></li>
                    </ul>
                </li>
                <li><a href="#">Bài Viết</a></li>
                <li><a href="{{route('home.about')}}">Giới Thiệu</a></li>
                <li><a href="{{route('home.contact')}}">Liên Hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-facebook"></i></a>
            <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-twitter"></i></a>
            <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-linkedin"></i></a>
            <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> Toantqpc00613@fpt.edu.vn</li>
                <li>Miễn Phí ship cho đờn hàng dưới 299k</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> toantqpc00613@fpt.edu.vn</li>
                                <li>Miễn phí ship cho đờn hàng 299k</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-linkedin"></i></a>
                                <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            @if (Auth::check())
                                <div class="header__top__right__language">
                                <a href="{{url('#')}}">
                                    <i class="fa fa-user"></i>
                                    {{ Auth::user()->name }}
                                </a>
                                </div>
                                <div class="header__top__right__auth">
                                    <a href="{{url('/logout')}}" onclick="return confirm('Bạn có nỡ thoát sau ?')">
                                        <i class="fa fa-sign-out"></i>
                                        Thoát</a>
                                </div>
                            @else
                                <div class="header__top__right__language">
                                <a href="{{url('/login')}}">Đăng Nhập</a>
                                </div>
                                <div class="header__top__right__auth">
                                    <a href="{{url('/register')}}">Đăng Kí</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('home.index')}}"><img src="{{url('client/img/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class="active">
                                <a href="{{route('home.index')}}">Trang Chủ</a></li>
                            <li>
                                <a href="{{route('home.shop')}}">
                                    Sản Phẩm
                                </a>
                            </li>
                            <li><a href="#">Bài Viết</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{route('home.about')}}">Giới Thiệu</a></li>
                                    <li><a href="{{route('home.cart')}}">Giỏ Hàng</a></li>
                                    <li><a href="{{route('checkout')}}">Thanh Toán</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('home.contact')}}">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2">
                    @php $total = 0 @endphp
                    @foreach((array) session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
                            <li><a href="{{route('home.cart')}}"><i class="fa fa-shopping-bag"></i>
                                <span id="total-quanty-show">{{ count((array) session('cart')) }}</span>
                            </a></li>
                        </ul>
                        <div id="change-item-cart">
                            <div class="header__cart__price">
                                Tổng: <span>{{number_format("$total",0,",",".")}}đ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Tất cả danh mục</span>
                        </div>
                        <ul id="category_display" style="display:none;">
                            @foreach ($category_global as $category_shop)
                                <li><a href="{{route('view',['slug'=>$category_shop->slug])}}">{{$category_shop->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{route('home.search')}}" method="GET">
                                <div class="hero__search__categories">
                                    Tất cả danh mục
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input
                                    name="key"
                                    type="text" placeholder="Bạn cần tìm gì vậy?">
                                <button type="submit" class="site-btn">TÌM KIẾM</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 822 576 436</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                    <x-banner/>
                </div>
            </div>
        </div>
    </section>

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{url('client/img/logo.png')}}" alt=""></a>
                        </div>
                        <ul>
                            <li><b>Địa chỉ:</b> 288 Nguyễn Văn Linh, An Khánh, Ninh Kiều, Cần Thơ</li>
                            <li><b>Điện Thoại:</b> 0822 576 436</li>
                            <li><b>Email:</b>toanqpc00613@fpt.edu.vn</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="footer__widget">
                        <h6>Liên Hệ</h6>
                        <p>Mọi chi tiết góp ý mời bạn gửi mail bên dưới. Thank</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Liên Hệ</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://www.facebook.com/tran.quoctoan.75033/" target="_blank">Trần Quốc Toản</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="{{url('client/img/payment-item.png')}}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{url('client/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('client/js/bootstrap.min.js')}}"></script>
    <script src="{{url('client/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{url('client/js/jquery-ui.min.js')}}"></script>
    <script src="{{url('client/js/jquery.slicknav.js')}}"></script>
    <script src="{{url('client/js/mixitup.min.js')}}"></script>
    <script src="{{url('client/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('client/js/main.js')}}"></script>
    @yield('js')
    {{-- xử lí cart ajax --}}
    <x-error/>


</body>
</html>