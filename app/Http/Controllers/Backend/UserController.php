<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.user.index', ['users' => $users]);
    }
    public function create()
    {
        return view('backend.user.create');
    }
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
        'userName' => 'required',
        'firstName' => 'required',
         'lastName' => 'required',
         'email' => 'required|email',
         'role' => 'required',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

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
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
        'userName' => 'required',
        'firstName' => 'required',
         'lastName' => 'required',
         'email' => 'required|email',
         'role' => 'required',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

        $userName = $request->input('userName');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $postalCode = $request->input('postalCode');
        $city = $request->input('city');
        $birthdate = $request->input('birthdate');
        $role = $request->input('role');
        $sex = $request->input('sex');

        $user = User::find($id);
        $user->userName = $userName;
        $user->firstName = $firstName;
        $user->lastName = $lastName;
        $user->email = $email;
        $user->postalCode = $postalCode;
        $user->city = $city;
        $user->birthdate = $birthdate;
        $user->role = $role;
        $user->sex = $sex;
        $user->save();

        return redirect()->route('backendUser.index')->with('success', 'User wurde erfolgreich geändert');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('backendUser.index');
    }
}
