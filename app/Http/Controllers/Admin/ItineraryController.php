<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItineraryRequest;

class ItineraryController extends Controller
{
    public function index()
    {
        $orders = Order::where([
            ['user_id', Auth::user()->id],
            ['status', OrderStatus::AWAIT],
        ])->get();

        return view('admin.itinerary.index', compact('orders'));
    }

    public function edit(int $id)
    {
        $order = Order::find($id);

        return view('admin.itinerary.edit', compact('order'));
    }

    public function update(ItineraryRequest $request, int $id)
    {
        Order::find($id)->update($request->all());

        return redirect()->route('itinerary.index');
    }

    public function complete(int $id)
    {
        $order = Order::find($id);
        $order->status = OrderStatus::COMPLETED;
        $order->save();

        return redirect()->route('itinerary.index');
    }

    public function destroy(int $id)
    {
        Order::find($id)->delete();

        return redirect()->route('itinerary.index');
    }
}
