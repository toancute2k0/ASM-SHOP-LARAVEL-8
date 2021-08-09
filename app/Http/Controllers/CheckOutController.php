<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CheckOutRequest;

class CheckOutController extends Controller
{
    public function checkout_form(){
        return view('frontend.checkout');
    }

    public function checkout_success(Order $order){
        $order = Order::orderBy('created_at', 'DESC')->select('id', 'email')->first();
        return view('frontend.checkout-success', compact('order'));
    }

    public function checkout_submit(CheckOutRequest $request){

        $user_id = Auth::user()->id;
        if($order = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note,
            'order_total' => $request->total,
            'status' => 0,
            'payment' => $request->payment,
            'users_id' => $user_id,
        ])) {
            $order_id = $order->id;
            $cart = session()->get('cart', []);

            foreach($cart as $item){
                OrderDetail::create([
                    'order_id' => $order_id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
        }
        $request->session()->flush();
        return redirect()->route('checkout.success')->with('success', 'Đặt hàng thành công!');
    }
}
