@extends('layouts.client')
@section('title')
    {{$blog_detail->name}}
@endsection
@section('content')



    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="{{url('client/img/blog/details/details-hero.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>{{$blog_detail->name}}</h2>
                        <ul>
                            <li>Viết bởi admin</li>
                            <li>
                                {{$blog_detail->created_at->format('d-m-Y')}}
                            </li>
                            <li>0 bình luận</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Danh Mục Bài Viết</h4>
                            <ul>
                                <li><a href="#">Sức Khoẻ</a></li>
                                <li><a href="#">Mẹo vặt</a></li>
                                <li><a href="#">Món Ăn</a></li>
                                <li><a href="#">Nông Nghiệp</a></li>
                                <li><a href="#">Du Lịch</a></li>
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Bài Viết Mới</h4>
                            <div class="blog__sidebar__recent">
                                @foreach ($date_blog as $date)
                                    <a href="{{route('getBlog',['slug'=>$date->slug])}}" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img src="{{url('uploads/blog')}}/{{$date->image}}" width="70">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>
                                                {{$date->name}}
                                            </h6>
                                            <span>
                                                {{$date->created_at->format('d-m-Y')}}
                                            </span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Tag</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Sức Khoẻ</a>
                                <a href="#">Mẹo vặt</a>
                                <a href="#">Món Ăn</a>
                                <a href="#">Nông Nghiệp</a>
                                <a href="#">Du Lịch</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <div class="css_blog_details">
                            {!!$blog_detail->description!!}
                        </div>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="{{url('backend/dist/img/admin1.jpg')}}" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>{{$blog_detail->BlogUser->name}}</h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Danh Mục:</span> Thức Ăn</li>
                                        <li><span>Tags:</span>
                                            Sức Khoẻ,
                                            Mẹo vặt,
                                            Món Ăn,
                                            Nông Nghiệp,
                                            Du Lịch,
                                        </li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-facebook"></i></a>
                                        <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-twitter"></i></a>
                                        <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-google-plus"></i></a>
                                        <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-linkedin"></i></a>
                                        <a href="https://www.facebook.com/tran.quoctoan.75033/"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Bạn Có Thể Thích</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($date_blog as $date)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{url('uploads/blog')}}/{{$date->image}}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>
                                            {{$date->created_at->format('d-m-Y')}}
                                        </li>
                                        <li><i class="fa fa-comment-o"></i> 0</li>
                                    </ul>
                                </ul>
                                <h5><a href="{{route('getBlog',['slug'=>$date->slug])}}">{{$date->name}}</a></h5>
                                <p>
                                    {{$date->summary}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->

@endsection