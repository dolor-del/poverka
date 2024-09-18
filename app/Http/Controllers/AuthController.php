<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ])) {
            return redirect('admin');
        }

        return redirect()->back()->with('status', 'Неправильный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
