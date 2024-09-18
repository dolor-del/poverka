<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatus;
use App\Models\Meter;
use App\Models\Order;
use App\Http\Requests\MeterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MetersController extends Controller
{
    protected const MAX_COUNT_COMPLETED = 10;

    public function index()
    {
        $meters = Meter::all();

        return view('admin.meters.index', compact('meters'));
    }

    public function create()
    {
        $orders = Order::where([
            ['user_id', Auth::user()->id],
            ['status', OrderStatus::AWAIT],
        ])->orderBy('date')->pluck('address', 'id');

        return view('admin.meters.create', compact('orders'));
    }

    public function store(MeterRequest $request)
    {
        $metersCount = Meter::where('order_id', $request->order_id)->count();
        $maxCount = static::MAX_COUNT_COMPLETED;

        if ($metersCount >= $maxCount) {
            $text = 'Нельзя добавить больше ' . $maxCount . ' счетчиков на одну заявку';
            return redirect()->back()->with('status', $text);
        }

        Meter::create($request->all());

        return redirect()->route('meters.index');
    }

    public function edit(int $id)
    {
        $meter = Meter::find($id);
        $orders = Order::where([
            ['user_id', Auth::user()->id],
            ['status', OrderStatus::AWAIT],
        ])->orderBy('date')->pluck('address', 'id');

        return view('admin.meters.edit', compact('meter', 'orders'));
    }

    public function update(MeterRequest $request, int $id)
    {
        Meter::find($id)->update($request->all());

        return redirect()->route('meters.index');
    }

    public function destroy(int $id)
    {
        Meter::find($id)->forceDelete();

        return redirect()->route('meters.index');
    }
}
