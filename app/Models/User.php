<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $attributes = [
        'role' => UserRole::WORKER,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'role' => UserRole::class,
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function setPasswordAttribute(?string $password)
    {
        if (null !== $password) {
            $this->attributes['password'] = Hash::make($password);
        }
    }
}
