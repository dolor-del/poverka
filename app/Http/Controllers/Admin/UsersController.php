<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatus;
use App\Models\User;
use App\Models\Order;
use Illuminate\Validation\Rule;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
        $request->validate([
            'email'    => 'unique:users',
            'password' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('users.index');
    }

    public function edit(int $id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, int $id)
    {
        $request->validate(['email' => Rule::unique('users')->ignore($id)]);

        User::find($id)->update($request->all());

        return redirect()->route('users.index');
    }

    public function destroy(int $id)
    {
        User::find($id)->delete();
        $orders = Order::where('user_id', $id)->get();

        foreach ($orders as $order) {
            if ($order->status->value === OrderStatus::AWAIT) {
                $order->status = OrderStatus::FORMED;
                $order->user_id = null;
                $order->save();
            }
        }

        return redirect()->route('users.index');
    }
}
