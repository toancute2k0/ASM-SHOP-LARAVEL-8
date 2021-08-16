<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

  public function contact() {
    return view('frontend.contact');
  }

  public function postContact(Request $request) {

    Mail::send('mail.contact', array(
        'name' => $request->name,
        'mess' => $request->content,
    ), function($message) use ($request){
        $message->from($request->email);
        $message->to('nhaozocom700@gmail.com', 'Hello Admin');
        $message->subject('test mail thôi ha');
    });

    return back()->with('success', 'Thanks for contacting us.');
  }

  public function changePass() {
    return view('auth.change-pass');
  }

  public function submitChangePass(Request $request) {
    $email = $request->email;
    $user = User::where('email', $email)->first();
    if(isset($user)){
      $password = bcrypt(1234567890);
      $request->merge([
          'password' => $password,
      ]);

      Mail::send('mail.reset-pass', array(
          'user' => $user,
      ), function($message) use ($request){
          $message->from('nhaozocom700@gmail.com', 'OGANI SHOP');
          $message->to($request->email);
          $message->subject('OGANI - Quên Mật Khẩu');
      });
      $user->update($request->all());
      return redirect()->route('login')->with('success', 'Quên Mật Khẩu Thành Công, Vui lòng kiểm tra Email!');
    }
    else {
      return back()->with('error', 'Email không tồn tại!');
    }
  }

}