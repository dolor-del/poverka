<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;

    protected $softCascade = ['meters'];

    protected $attributes = [
        'declared' => 1,
        'description' => null,
        'user_id' => null,
        'status' => OrderStatus::FORMED,
    ];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    protected $fillable = [
        'name',
        'address',
        'phone',
        'description',
        'declared',
        'date',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function meters()
    {
        return $this->hasMany(Meter::class);
    }
}
