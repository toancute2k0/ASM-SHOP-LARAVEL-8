@extends('layouts.admin') @section('title', 'QL Tài Khoản')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">QL Tài Khoản</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">QL Tài Khoản</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
              <a class="btn btn-primary" href="{{route('user.create')}}">Thêm Tài Khoản</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Trạng Thái</th>
                        <th>Ngày tạo</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $users)
                    <tr>
                        <td scope="row">{{$users->id}}</td>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>
                            @if ($users->role == 1)
                                <span class="badge badge-success">Khách hàng</span>
                            @else
                                <span class="badge badge-danger">Admin</span>
                            @endif
                        </td>
                        <td>
                            @if ($users->status == 1)
                                <span class="badge badge-success">Public</span>
                            @else
                                <span class="badge badge-danger">Private</span>
                            @endif
                        </td>
                        <td>{{$users->created_at->format('m-d-Y')}}</td>
                        <td class="text-right">
                            <a href="{{route('user.edit', $users->id)}}" class="btn btn-sm btn-dark">
                                    <i class="fas fa-edit"></i>
                                </a>
                            <a href="{{route('user.destroy', $users->id)}}" class="btn btn-sm btn-danger btn_delete">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- viết chức nănng xoá all --}}
            <form method="POST" action="" id="form-delete">
                @csrf @method('DELETE')

            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('js')
    <script>
        $('.btn_delete').click(function(ev){
            ev.preventDefault();//không cho load lại page
            var _href = $(this).attr('href');//lấy địa chỉ
            $('form#form-delete').attr('action', _href);
            if(confirm('Bạn có thực sự nỡ xoá nó không ?')){
                $('form#form-delete').submit();
            }
        })
    </script>
@endsection
