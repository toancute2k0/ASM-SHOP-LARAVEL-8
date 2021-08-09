<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

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

}