<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'doc_number',
        'state_register',
        'meter_number',
        'modification',
        'temperature',
        'date_contract',
        'date_expire',
        'order_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function add(array $fields): self
    {
        $meter = new static;
        $meter->fill($fields);
        $meter->order_id = 1;
        $meter->save();

        return $meter;
    }

    public function edit(array $fields): void
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove(): void
    {
        $this->delete();
    }

    public function setOrder(int $id): void
    {
        $order = Order::find($id);
        $this->order()->save($order);
    }
}
