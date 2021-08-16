<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::orderBy('created_at', 'DESC')->get();
        return view('admin.order.index', compact('order'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Order $order)
    {
        //
    }

    public function edit($id)
    {
        $order = Order::where('id', $id)->first();
        $order_detail = OrderDetail::where('order_id', $order->id)->get();
        return view('admin.order.edit', compact('order', 'order_detail'));
    }

    public function update(Request $request, Order $order)
    {
        $order_detail = OrderDetail::where('order_id', $order->id)->get();
        $order->update([
            'status' => $request->status,
        ]);
        Mail::send('mail.ship-status', array(
            'order' => $order,
            'cart_item' => $order_detail,
        ), function($message) use ($order){
            $message->from('nhaozocom700@gmail.com', 'OGANI SHOP');
            $message->to($order->email);
            $message->subject('OGANI - Tình Trạng Đơn Hàng');
        });
        return redirect()->route('order.index')->with('success', 'Cập nhật đơn hàng thành công');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        $order->getOrderDetail()->delete();
        return redirect()->route('order.index')->with('success', 'Xoá đơn hàng thành công');
    }
}
