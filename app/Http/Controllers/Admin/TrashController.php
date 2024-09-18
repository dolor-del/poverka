<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;

class TrashController extends Controller
{
    public function index()
    {
        $orders = Order::onlyTrashed()->get();

        return view('admin.trash.index', compact('orders'));
    }

    public function update(int $id)
    {
        Order::withTrashed()->find($id)->restore();

        return redirect()->route('trash.index');
    }

    public function destroy(int $id)
    {
        Order::withTrashed()->find($id)->forceDelete();

        return redirect()->route('trash.index');
    }
}
