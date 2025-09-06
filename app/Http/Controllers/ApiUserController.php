<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Traits\ConsumeApiUsers;
use Illuminate\Support\Str;

class ApiUserController extends Controller
{
    use ConsumeApiUsers;

    public function index()
    {
        $users = $this->getApiUsers();


        return view('apiUsers.index', [
            'users' => $users,
            'breadcrumb' => [
                'Inicio' => route('dashboard'),
                'API Users' => null,
            ],
        ]);
    }

    public function create()
    {
        return view('apiUsers.form', [
            'action'     => route('api-users.store'),
            'method'     => 'POST',
            'breadcrumb' => [
                'Inicio'    => route('dashboard'),
                'API Users'     => route('api-users.index'),
                'Create API User' => null,
            ],
            'user'       => null,
            'title'      => 'Create user'
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|',
        ]);

        $users = $this->getApiUsers();

        $exists = collect($users)->contains(function ($user) use ($request) {
            return strtolower($user['email']) === strtolower($request->email);
        });

        if ($exists) {
            return response()->json([
                'errors' => [
                    'email' => ['El email ya existe en la API'],
                ]
            ], 422);
        }


        if ($file = $request->file('user_image')) {
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/users-icons'), $filename);
            $data['photo'] = 'img/users-icons/' . $filename;
        } else {
            $data['photo'] = $request->input('current_photo', 'img/users-icons/Sample_User_Icon.png');
        }
        $data['uid_admin'] = session('api_uid');

        $user = $this->postApiUser($data);

        return response()->json(['success' => true, 'redirect' => route('api-users.show', $user['uid'])]);
    }

    public function show($uid)
    {
        $user = $this->getApiUser($uid);
        return view('apiUsers.show', [
            'user'       => $user,
            'action'     => route('api-users.store'),
            'method'     => 'POST',
            'breadcrumb' => [
                'Inicio'    => route('dashboard'),
                'API Users'     => route('api-users.index'),
                $user["name"] => null,
            ],
        ]);
    }

    public function edit($uid)
    {
        $user = $this->getApiUser($uid);
        return view('apiUsers.form', [
            'action'     => route('api-users.update', $user['uid']),
            'method'     => 'PUT',
            'breadcrumb' => [
                'Inicio'    => route('dashboard'),
                'API Users'     => route('api-users.index'),
                $user["name"] => route('api-users.show', $user['uid']),
                'Update' => null,
            ],
            'user'       => $user,
            'title'      => 'Update user',
        ]);
    }

    public function update(Request $request, $uid)
    {
        $user = $this->getApiUser($uid);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|',
        ]);

        if ($file = $request->file('user_image')) {
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/users-icons'), $filename);
            $data['photo'] = 'img/users-icons/' . $filename;
        } else {
            $data['photo'] = $request->input('current_photo', 'img/users-icons/Sample_User_Icon.png');
        }

        $data['uid'] = $uid;

        $user = $this->patchApiUser($uid, $data);

        return response()->json(['success' => true, 'redirect' => route('api-users.show', $user['uid'])]);
    }

    public function destroy($uid)
    {
        $this->deleteApiUser($uid);
        return response()->json(['success' => true, 'redirect' => route('api-users.index')]);
    }
}
