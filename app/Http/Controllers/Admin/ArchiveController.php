<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', OrderStatus::COMPLETED)->get();

        return view('admin.archive.index', compact('orders'));
    }

    public function update(int $id)
    {
        $order = Order::find($id);
        $order->status = OrderStatus::AWAIT;
        $order->save();

        return redirect()->route('archive.index');
    }

    public function destroy(int $id)
    {
        Order::find($id)->delete();

        return redirect()->route('archive.index');
    }
}
