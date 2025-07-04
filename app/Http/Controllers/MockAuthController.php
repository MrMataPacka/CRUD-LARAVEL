<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MockAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login()
    {
        return redirect()->route('home');
    }
}
