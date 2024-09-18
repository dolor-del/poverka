<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Enums\OrderStatus;
use App\Enums\UserRole;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    protected const MAX_COUNT_DECLARED = 10;

    public function index()
    {
        $orders = Order::where('status', '!=', OrderStatus::COMPLETED)->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::where('role', UserRole::WORKER)->get()->pluck('name', 'id');

        return view('admin.orders.create', [
            'maxCountDeclared' => static::MAX_COUNT_DECLARED,
            'users' => $users,
        ]);
    }

    public function store(OrderRequest $request)
    {
        $order = new Order($request->all());

        if (null !== $request->user_id) {
            $order->status = OrderStatus::AWAIT;
        }

        $order->save();

        return redirect()->route('orders.index');
    }

    public function edit(int $id)
    {
        $order = Order::find($id);
        $users = User::where('role', UserRole::WORKER)->get()->pluck('name', 'id');

        return view('admin.orders.edit', [
            'maxCountDeclared' => static::MAX_COUNT_DECLARED,
            'order' => $order,
            'users' => $users,
        ]);
    }

    public function update(OrderRequest $request, int $id)
    {
        $order = Order::find($id);
        $order->fill($request->all());

        if (null !== $request->user_id) {
            $order->status = OrderStatus::AWAIT;
        } else {
            $order->status = OrderStatus::FORMED;
        }

        $order->save();

        return redirect()->route('orders.index');
    }

    public function destroy(int $id)
    {
        Order::find($id)->delete();

        return redirect()->route('orders.index');
    }
}
