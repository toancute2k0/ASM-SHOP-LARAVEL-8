@extends('layouts.client')
@section('title', 'Bài viết')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{url('client/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Bài Viết</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('home.index')}}">Trang chủ</a>
                            <span>Bài Viết</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
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
                            <h4><i class="fa fa-tag" aria-hidden="true"></i></h4>
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
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        @foreach ($show_blog as $blogs)
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <img src="{{url('uploads/blog')}}/{{$blogs->image}}" alt="">
                                    </div>
                                    <div class="blog__item__text">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i>
                                                {{$blogs->created_at->format('d-m-Y')}}
                                            </li>
                                            <li><i class="fa fa-comment-o"></i> 0</li>
                                        </ul>
                                        <h5><a href="{{route('getBlog',['slug'=>$blogs->slug])}}">{{$blogs->name}}</a></h5>
                                        <p>
                                            {{$blogs->summary}}
                                        </p>
                                        <a href="{{route('getBlog',['slug'=>$blogs->slug])}}" class="blog__btn">
                                            Xem Chi Tiết
                                            <span class="arrow_right"></span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-lg-12">
                            <hr>
                            <div class="">
                                {{ $show_blog->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection