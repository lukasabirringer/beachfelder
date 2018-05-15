<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\StoreUserRequest;
use App\Http\Requests\Backend\UpdateUserRequest;
use App\User;
use DB;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('favorites')->get();
        
        $users->count = $users->count();

        foreach ($users as $user) {
            $user->countFavorites = $user->favorites()->count();
        }

        return view('backend.user.index', ['users' => $users]);
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        DB::table('users')->insert(
            ['userName' => $request->userName,
             'firstName' => $request->firstName,
             'lastName' => $request->lastName,
             'email' => $request->email,
             'postalCode' => $request->postalCode,
             'city' => $request->city,
             'birthdate' => $request->birthdate,
             'role' => $request->role,
             'sex' => $request->sex,
             'password' => bcrypt($request->password),
             ]
        );

        return redirect()->route('backendUser.index')->with('success', 'User wurde erfolgreich angelegt');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('backend.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('backend.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $validated = $request->validated();

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('backendUser.index')->with('success', 'User wurde erfolgreich geändert');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('backendUser.index');
    }
}