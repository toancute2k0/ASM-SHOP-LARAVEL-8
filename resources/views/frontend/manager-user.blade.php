@extends('layouts.client')
@section('title', 'Quản lí tài khoản')
@section('css')
    <link rel="stylesheet" href="{{url('client/css/managerUser.css')}}" type="text/css">
    <style>
        .text-muted {
            color: red !important;
        }
    </style>
@endsection
@section('content')
    @if (Auth::check())
        <div class="wrapper">
            <div class="container">
                <div class="wrapper_inner">
                    <div class="vertical_wrap">
                        <div class="backdrop"></div>
                        <div class="vertical_bar">
                            <div class="profile_info">
                                <div class="img_holder">
                                    <img src="{{url('uploads/user')}}/{{Auth::user()->avatar}}" alt="profile_pic">
                                </div>
                                <p class="title">{{ Auth::user()->name }}</p>
                                <p class="sub_title">{{ Auth::user()->email }}</p>
                            </div>
                            <ul class="menu" style="display: block;">
                                <li><a href="{{route('manager.index')}}" class="active">
                                    <span class="icon"><i class="fa fa-home"></i></span>
                                    <span class="text">Tài Khoản</span>
                                </a></li>
                                <li><a href="{{route('manager.getPass')}}">
                                    <span class="icon"><i class="fa fa-user"></i></span>
                                    <span class="text">Đổi Mật Khẩu</span>
                                </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="main_container">
                        <div class="top_bar">
                            <div class="hamburger">
                                <i class="fa fa-bars"></i>
                            </div>
                            <div class="logo">
                                <span>Quản Lí Tài Khoản</span>
                            </div>
                        </div>

                        <div class="container">
                            <div class="content">
                                <div class="item active">
                                    <form id="update1" action="{{route('manager.update')}}" method="post" role="form" enctype="multipart/form-data" > @csrf
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">Họ và Tên</label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        value="{{Auth::user()->name}}"
                                                    />
                                                    @error('name')
                                                    <small id="helpId" class="text-muted">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input
                                                        type="text"
                                                        name="email"
                                                        class="form-control"
                                                        value="{{Auth::user()->email}}"
                                                    />
                                                    @error('email')
                                                    <small id="helpId" class="text-muted">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Địa Chỉ</label>
                                                    <input
                                                        type="text"
                                                        name="address"
                                                        class="form-control"
                                                        value="{{Auth::user()->address}}"
                                                    />
                                                    @error('address')
                                                    <small id="helpId" class="text-muted">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="row" style="display: none;">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Mật Khẩu</label>
                                                            <input
                                                                type="password"
                                                                name="password"
                                                                class="form-control"
                                                                value="{{Auth::user()->password}}"
                                                            />
                                                            @error('password')
                                                            <small id="helpId" class="text-muted">{{$message}}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Xác Nhận Mật Khẩu</label>
                                                            <input
                                                                type="password"
                                                                name="confirm_password"
                                                                class="form-control"
                                                                value="{{Auth::user()->password}}"
                                                            />
                                                            @error('confirm_password')
                                                            <small id="helpId" class="text-muted">{{$message}}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-block btn-dark rounded-0">CẬP NHẬT</button>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Số điện thoại</label>
                                                    <input
                                                        type="text"
                                                        name="phone"
                                                        class="form-control"
                                                        value="{{Auth::user()->phone}}"
                                                    />
                                                    @error('phone')
                                                    <small id="helpId" class="text-muted">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Hình Ảnh</label>
                                                    <div class="custom-file">
                                                        <input value="{{url('uploads/user')}}/{{Auth::user()->avatar}}" type="file" name="avatar" id="files" class="custom-file-input" id="customFile">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                    <img src="{{url('uploads/user')}}/{{Auth::user()->avatar}}" id="image" class="rounded" style="width:100%">
                                                    @error('avatar')
                                                    <small id="helpId" class="text-muted"
                                                        >{{$message}}</small
                                                    >
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                {{-- <div id="menu1" class="item tab-pane fade">
                                    <form id="update2" action="{{route('manager.updatePass')}}" method="post" role="form" enctype="multipart/form-data"> @csrf
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">Mật Khẩu Hiện Tại</label>
                                                    <input
                                                        type="password"
                                                        name="password"
                                                        class="form-control"
                                                    />
                                                    @error('password')
                                                    <small id="helpId" class="text-muted">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                                            <label for="">Mật Khẩu Mới</label>
                                                            <input
                                                                type="password"
                                                                name="new_password"
                                                                class="form-control"
                                                            />
                                                            @error('new_password')
                                                            <small id="helpId" class="text-muted">{{$message}}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Xác Nhận Mật Khẩu</label>
                                                            <input
                                                                type="password"
                                                                name="confirm_password"
                                                                class="form-control"
                                                            />
                                                            @error('confirm_password')
                                                            <small id="helpId" class="text-muted">{{$message}}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-block btn-dark rounded-0">CẬP NHẬT</button>
                                                </div>
                                            </div>
                                            <div class="col-md-4">

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="menu2" class="item tab-pane fade">
                                    <h3>Menu 2</h3>
                                    <p>Some content in menu 2.</p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('js')
    <script>


        var hamburger = document.querySelector(".hamburger");
        var wrapper  = document.querySelector(".wrapper");
        var backdrop = document.querySelector(".backdrop");

        hamburger.addEventListener("click", function(){
            wrapper.classList.add("active");
        })

        backdrop.addEventListener("click", function(){
            wrapper.classList.remove("active");
        })
    </script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        //show image
        document.getElementById("files").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("image").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>
@endsection


