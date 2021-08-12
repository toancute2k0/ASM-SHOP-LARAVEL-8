@extends('layouts.client')
@section('title', 'Liên Hệ')
@section('content')
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="{{url('client/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                <h2>Contact Us</h2>
                <div class="breadcrumb__option">
                    <a href="{{route('home.index')}}">Home</a>
                    <span>Liên Hệ</span>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Contact Section Begin -->
        <section class="contact spad">
        <div class="container">
            <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                <span class="icon_phone"></span>
                <h4>Số điện thoại</h4>
                <p>0822 576 436</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                <span class="icon_pin_alt"></span>
                <h4>Địa chỉ</h4>
                <p>288 Nguyễn Văn Linh, An Khánh, Ninh Kiều, Cần Thơ</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                <span class="icon_clock_alt"></span>
                <h4>Giờ hoạt động</h4>
                <p>10:00 am to 23:00 pm</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                <span class="icon_mail_alt"></span>
                <h4>Email</h4>
                <p>toanpc00613@fpt.edu.vn</p>
                </div>
            </div>
            </div>
        </div>
        </section>
        <!-- Contact Section End -->

        <!-- Map Begin -->
        <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.8802276473216!2d105.75475265657215!3d10.02674143833513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a088476bafffdf%3A0x4da67960eb05332d!2zVHLGsOG7nW5nIENhbyDEkOG6s25nIFRo4buxYyBIw6BuaCBGUFQgUG9seXRlY2huaWMgQ-G6p24gVGjGoQ!5e0!3m2!1svi!2s!4v1628478945310!5m2!1svi!2s"
            height="500"
            style="border: 0"
            allowfullscreen=""
            aria-hidden="false"
            tabindex="0"
        ></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
            <h4>Cao đẳng Fpt polytechnic</h4>
            <ul>
                <li>Phone: +12-345-6789</li>
                <li> 288 Nguyễn Văn Linh, An Khánh, Ninh Kiều, Cần Thơ</li>
            </ul>
            </div>
        </div>
        </div>
        <!-- Map End -->

        <!-- Contact Form Begin -->
        <div class="contact-form spad">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                <h2>Liên Hệ Góp Ý</h2>
                </div>
            </div>
            </div>
            <form action="{{route('home.contact')}}" method="POST"> @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Tên của bạn" name="name" />
                    </div>
                    <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Email liên hệ" name="email"/>
                    </div>
                    <div class="col-lg-12 text-center">
                    <textarea placeholder="Nội dung tin nhắn" name="content"></textarea>
                    <button type="submit" class="site-btn">GỬI MAIL</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <!-- Contact Form End -->

@endsection