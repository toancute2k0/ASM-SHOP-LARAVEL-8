<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function checkout_form(){
        return view('frontend.checkout');
    }

    public function checkout_success(){
        return view('frontend.checkout-success');
    }

    public function checkout_submit(Request $request){
        $user_id = Auth::user()->id;
        if($order = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note,
            'order_total' => $request->total,
            'status' => 0,
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
