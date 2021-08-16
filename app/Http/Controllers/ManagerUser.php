<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\User\UserUpdate;
use App\Http\Requests\User\ChangePass;

class ManagerUser extends Controller
{
    public function index(){
        return view('frontend.manager-user');
    }

    public function update(UserUpdate $request)
    {
        $user = Auth::user();
        if($request->hasFile("avatar")){
            $imagePath = public_path('uploads/user/'.$user->avatar);
            if(File::exists($imagePath)){
                unlink($imagePath);
            }
            $file=$request->file("avatar");
            $ext = $request->avatar->getClientOriginalExtension();
            $user->avatar=time().rand(100,999).'-'.'user.'.$ext;
            $file->move(\public_path("uploads/user/"),$user->avatar);
            $request['avatar']=$user->avatar;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->avatar = $user->avatar;
        if($request->password != $user->password){
            $password = bcrypt($request->password);
            $user->password = $password;
            $user->update();
        }
        else {
            $user->password = $request->password;
            $user->update();
        }
        return redirect()->route('manager.index')->with('success', 'Cập nhật tài khoản thành công!');
    }

    public function getUpdatePass(){
        return view('frontend.change-pass');
    }

    public function updatePass(ChangePass $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            User::find(Auth::id())->update(['password' => bcrypt($request->new_password)]);
            Auth::logout();
            return redirect()->route('login')->with('success', 'Đổi mật khẩu thành công, Vui lòng đăng nhập lại!');
        } else {
            return redirect()->route('manager.index')->with('error', 'Đổi mật khẩu không thành công!');
        }
    }
}
