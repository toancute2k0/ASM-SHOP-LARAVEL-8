@extends('layouts.admin') @section('title', 'Cập nhật Tài Khoản')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cập nhật Tài Khoản</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tài Khoản</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('user.update', $user->id)}}" method="post" role="form">
                @csrf @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Họ và Tên</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                aria-describedby="helpId"
                                value="{{$user->name}}"
                            />
                            @error('name')
                                <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                aria-describedby="helpId"
                                value="{{$user->email}}"
                            />
                            @error('email')
                                <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mật Khẩu</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                aria-describedby="helpId"
                                value="{{$user->password}}"
                            />
                            @error('password')
                                <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input
                                type="text"
                                name="address"
                                class="form-control"
                                aria-describedby="helpId"
                                value="{{$user->address}}"
                            />
                            @error('address')
                                <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input
                                type="number"
                                name="phone"
                                class="form-control"
                                aria-describedby="helpId"
                                value="{{$user->phone}}"
                            />
                            @error('phone')
                                <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Trạng Thái</label>
                            <select class="form-control" name="status">
                                <option value="0" {{ $user->status == '0' ? 'selected' : ''}}>
                                    Vô hiệu hoá
                                </option>
                                <option value="1" {{ $user->status == '1' ? 'selected' : ''}}>
                                    Hiển Thị
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Phân Quyền</label>
                            <select class="form-control" name="role">
                                <option value="0" {{ $user->role == '0' ? 'selected' : ''}}>
                                    Admin
                                </option>
                                <option value="1" {{ $user->role == '1' ? 'selected' : ''}}>
                                    Khách Hàng
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
