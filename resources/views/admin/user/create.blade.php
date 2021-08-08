@extends('layouts.admin') @section('title', 'Thêm Tài Khoản Admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm Tài Khoản Admin</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tài Khoản Admin</a></li>
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
            {{-- thông báo lỗi --}}
            @include('errors.mess')
            {{-- end thông báo lỗi --}}
            <form action="{{route('user.store')}}" method="post" role="form"> @csrf
                <div class="form-group col-sm-6">
                    <label for="">Tên Admin</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        aria-describedby="helpId"
                    />
                    @error('name')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Email</label>
                    <input
                        type="text"
                        name="email"
                        class="form-control"
                        aria-describedby="helpId"
                    />
                    @error('email')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="">PassWord</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        aria-describedby="helpId"
                    />
                    @error('password')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Xác nhận PassWord</label>
                    <input
                        type="password"
                        name="confirm_password"
                        class="form-control"
                        aria-describedby="helpId"
                    />
                    @error('confirm_password')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <button type="submit" class="btn btn-primary">Thêm Mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection
