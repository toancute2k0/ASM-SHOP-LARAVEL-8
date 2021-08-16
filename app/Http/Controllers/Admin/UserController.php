<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\UpdateUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function index()
    {
        $data = user::orderBy('created_at', 'DESC')->paginate(15);
        return view('admin.user.index', compact('data'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|unique:users,name',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required',
    //         'confirm_password' => 'required|same:password',
    //     ],[
    //         'name.required' => '*Tên User Admin không được để trống!',
    //         'name.unique' => '*User Admin này đã tồn tại!',
    //         'email.required' => '*Email User Admin không được để trống!',
    //         'email.unique' => '*Email User Admin dã tồn tại!',
    //         'email.email' => '*Email User Admin không đúng định dạng!',
    //         'password.required' => '*Mật khẩu không được để trống!',
    //         'confirm_password.same' => '*Mật khẩu không trùng khớp!',
    //         'confirm_password.required' => '*Nhập lại mật khẩu!',
    //     ]);
    //     $password = bcrypt($request->password);
    //     $confirm_password = bcrypt($request->confirm_password);
    //     $request->merge([
    //         'password' => $password,
    //         'confirm_password' => $confirm_password,
    //     ]);
    //     if(user::create($request->all())){
    //         return redirect()->route('user.index')->with('success', 'Thêm User Admin thành công');
    //     }
    // }

    public function show(user $user)
    {
        //
    }

    public function edit(user $user)
    {
        return view('admin.user.edit', compact('user'));
    }


    public function update(UpdateUser $request, user $user)
    {

        if($request->password != $user->password){
            $password = bcrypt($request->password);
            $request->merge([
                'password' => $password,
            ]);
            $user->update($request->all());
        }
        else {
            $user->update($request->all());
        }
        return redirect()->route('user.index')->with('success', 'Cập nhật thành công thành công!');
    }

    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Xoá User Admin thành công');
    }
}
