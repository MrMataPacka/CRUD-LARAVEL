<?php

namespace App\Http\Controllers;

use App\Models\AtUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = AtUser::where('email', $request->email)->first();

        if (
            !$user ||
            !Hash::check($request->password, $user->password) ||
            $user->status !== 'ACTIVO'
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Correo o contraseña incorrectos o cuenta inactiva'
            ], 401);
        }

        session([
            'user_id'   => $user->uid,
            'user_name' => $user->email,
        ]);

        return response()->json([
            'success' => true,
            'redirect' => route('dashboard')
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_id');
        return redirect()->route('login');
    }
}
