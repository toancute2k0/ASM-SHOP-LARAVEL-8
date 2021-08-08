@extends('layouts.client') @section('title', 'Đặt Hàng Thành Công') @section('css')
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet" />
<style>
     .checkout_success {
          text-align: center;
          padding: 10px 0;

     }
     .checkout_success h1 {
          color: #1b6535 ;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
     }
     .checkout_success p {
          color: #404f5e;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size: 20px;
          margin: 0;
     }
     .checkout_success i {
          color: #1b6535 ;
          font-size: 100px;
          line-height: 200px;
          margin-left: -15px;
     }
     .checkout_success .card {
          background: white;
          padding: 60px;
          border-radius: 4px;
          box-shadow: 0 2px 3px #c8d0d8;
          display: inline-block;
          margin: 0 auto;
     }
     .checkout_success a {
          background: #1b6535;

     }
</style>
@endsection @section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{url('public/client')}}/img/breadcrumb.jpg">
     <div class="container">
          <div class="row">
               <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text"></div>
               </div>
          </div>
     </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
     <div class="container">
          <div class="checkout_success">
               <div style="border-radius: 200px; height: 200px; width: 200px; background: #f8faf5; margin: 0 auto;">
                    <i class="checkmark">✓</i>
               </div>
               <h1>Đặt hàng thành công!</h1>
               <p>
                    Vui lòng truy cập email
                    <span style="color: #0011ff">
                        {{Auth::user()->email}}
                     </span> để theo dõi tình trạng đơn hàng<br />
                    Chân thành cảm ơn bạn ^-^!
               </p>
               <a href="{{route('home.shop')}}" class="btn btn-success mt-4">
                    TIẾP TỤC MUA HÀNH
               </a>
          </div>
     </div>
</section>
<!-- Product Section End -->

@endsection
