<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function login()
    {
        if (Auth::check()) {
            return view('dashboard.index');
        } else {
            return view('auth.login');
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
