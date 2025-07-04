<?php

namespace App\Http\Controllers;

use App\Models\AtUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\AtState;
use App\Models\AtTown;
use Illuminate\Support\Str;

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

    public function restorePassword()
    {
        return view('auth.restorePassword');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_id');
        return redirect()->route('login');
    }

    public function createUser()
    {
        $states = AtState::orderBy('name')->get();
        $towns = collect();

        return view('users.form', [
            'action'     => route('store.public.user'),
            'method'     => 'POST',
            'breadcrumb' => [
                'Inicio' => route('login'),
                'Registro' => null,
            ],
            'user'       => new AtUser(),
            'title'      => 'Crear cuenta',
            'states'     => $states,
            'towns'      => $towns,
        ]);
    }

    public function storePublicUser(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'age'        => 'required|integer|min:0',
            'email'      => 'required|email|unique:at_users,email',
            'phone'      => 'required|string|max:20',
            'sex'        => 'required|in:M,F,O',
            'password'   => 'required|string|min:6|confirmed',
            'towid'      => 'required|exists:at_town,towid',
        ]);

        if ($file = $request->file('user_image')) {
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/users-icons'), $filename);
            $data['photo'] = 'img/users-icons/' . $filename;
        } else {
            $data['photo'] = $request->input('photo', 'img/users-icons/Sample_User_Icon.png');
        }

        $user = AtUser::create(array_merge($data, [
            'password'       => Hash::make($data['password']),
            'date_creation'  => now(),
            'status'         => 'ACTIVO',
        ]));

        return response()->json(['success' => true, 'redirect' => route('login')]);
    }
}
