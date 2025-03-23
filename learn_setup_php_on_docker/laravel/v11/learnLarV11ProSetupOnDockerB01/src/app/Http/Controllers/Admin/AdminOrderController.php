<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function orders()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(12);
        return view('admin.orders', compact('orders'));
    }

    public function order_details($orderId)
    {
        $order = Order::find($orderId);

        $orderItems = OrderItem::where('order_id', '=', $orderId)->paginate(12);
        $transaction = Transaction::where('order_id', $orderId)->first();
        return view('admin.order-details', compact('order', 'orderItems', 'transaction'));
    }
}
