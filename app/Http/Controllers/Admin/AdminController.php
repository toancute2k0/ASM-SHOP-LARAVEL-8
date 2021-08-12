<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{


    public function dashboard() {
        $product_count = Product::count();
        $category_count = Category::count();
        $user_count = User::count();
        $Order_count = Order::count();
        return view('admin.dashboard', compact('product_count', 'category_count',
         'user_count', 'Order_count'));
    }



    public function register(){
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $data) {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'role' => 1,//Trần Quốc Toản
            'status' => 1,
            'avatar' => 1,

        ]);
        Mail::send('mail.login_success', array(
            'user' => $user,
        ), function($message) use ($data){
            $message->from('nhaozocom700@gmail.com', 'OGANI SHOP');
            $message->to($data->email);
            $message->subject('Đăng Kí Thành công tài khoản');
        });
        $user -> save();
        return redirect()->route('login')->with('success', 'Đăng kí thành công thành công!');
    }

    public function login(){
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $check = $request->only('email', 'password');
        $tick = $request->has('checkrmb');
        if(Auth::attempt($check, $tick)){
            $role=Auth::user()->role;
            if ($role == '0'){
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập Admin thành công!');
            }
            else {
                return redirect()->route('home.index')->with('success', 'Đăng nhập thành công!');
            }

        }
        else {
            return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác!');
        }

    }

    public function logout (){
        Auth::logout();
        return redirect()->route('home.index');
    }
}
