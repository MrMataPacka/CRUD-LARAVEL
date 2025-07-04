<?php

namespace App\Http\Controllers;

use App\Models\AtUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\AtTown;
use App\Models\AtState;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(
                AtUser::where('status', 'ACTIVO')
            )
            ->addColumn('photo', function ($user) {
                return '<img src="'.asset($user->photo).'" class="rounded-full w-16 h-16 object-cover" />';
            })
            ->addColumn('acciones', function ($user) {
                $showUrl = route('users.show', $user->uid);
                $editUrl = route('users.edit', $user->uid);
                $deleteUrl = route('users.destroy', $user->uid);

                return view('components.users-actions', compact('showUrl', 'editUrl', 'deleteUrl'))->render();
            })
            ->rawColumns(['photo', 'acciones'])
            ->toJson();
        }

        return view('users.index', [
            'breadcrumb' => [
                'Inicio' => route('dashboard'),
                'Users'  => null,
            ],
        ]);
    }

    public function create()
    {
        $states = AtState::orderBy('name')->get();
        $towns = collect();
        return view('users.form', [
            'action'     => route('users.store'),
            'method'     => 'POST',
            'breadcrumb' => [
                'Inicio'      => route('dashboard'),
                'Users'       => route('users.index'),
                'Create user'  => null,
            ],
            'user'       => new AtUser(),
            'title'      => 'Create user',
            'states'     => $states,
            'towns'      => $towns,
        ]);
    }

    public function store(Request $request)
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
            $data['photo'] = $request->input('current_photo', 'img/users-icons/Sample_User_Icon.png');
        }

        $user = AtUser::create(array_merge($data, [
            'password'       => Hash::make($data['password']),
            'date_creation'  => now(),
            'status'         => 'ACTIVO',
        ]));

        return response()->json(['success' => true, 'redirect' => route('users.show', $user->uid)]);

    }

    public function show($uid)
    {
         $user = AtUser::findOrFail($uid);

        return view('users.show', [
            'user'       => $user,
            'breadcrumb' => [
                'Inicio' => route('dashboard'),
                'Users'  => route('users.index'),
                $user->name => null,
            ],
        ]);
    }

    public function edit($uid)
    {

        $user = AtUser::findOrFail($uid);
        $states = AtState::orderBy('name')->get();

        $selectedState = optional($user->town)->staid;

        $towns = $selectedState
            ? AtTown::where('staid', $selectedState)->orderBy('name')->get()
            : collect();


        return view('users.form', [
            'action'     => route('users.update', $user->uid),
            'method'     => 'PUT',
            'breadcrumb' => [
                'Inicio'     => route('dashboard'),
                'Users'      => route('users.index'),
                $user->name  => route('users.show', $user->uid),
                'Actualizar' => null,
            ],
            'user'       => $user,
            'title'      => 'Actualizar user',
            'states'     => $states,
            'towns'      => $towns,
            'selectedState'  => $selectedState,
        ]);
    }

    public function update(Request $request, $uid)
    {
        $user = AtUser::findOrFail($uid);

        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'age'        => 'required|integer|min:0',
            'email'      => "required|email|unique:at_users,email,{$uid},uid",
            'phone'      => 'required|string|max:20',
            'sex'        => 'required|in:M,F,O',
            'towid'      => 'required|exists:at_town,towid',
        ]);

        if ($file = $request->file('user_image')) {
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/users-icons'), $filename);
            $data['photo'] = 'img/users-icons/' . $filename;
        } else {
            // 👇 Aquí usas la ruta que JS mandó manualmente
            $data['photo'] = $request->input('photo', 'img/users-icons/Sample_User_Icon.png');
        }

        $user->update($data);

        return response()->json(['success' => true, 'redirect' => route('users.show', $user->uid)]);


    }

    public function destroy($uid)
    {
        $user = AtUser::findOrFail($uid);
        $user->status = 'INACTIVO';
        $user->save();

        return response()->json(['success' => true, 'redirect' => route('users.index')]);


    }
}
