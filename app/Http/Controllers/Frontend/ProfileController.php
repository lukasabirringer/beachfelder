<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\User;
use App\Favorites;
use App\Footernavigation;
use App\Submittedbeachcourt;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Storage;
use File;
use Image;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfileController extends Controller
{
    public function show($name, Request $request)
    {

        $user = Auth::user();
        $profileuser = User::where('userName', $request->name)->first();
        if (!$profileuser) {
          return back();
        }

        $filename = $user->pictureName;
        $profilepicture = auth()->id() . '/' . $filename;

        $min = $request->min;
        $max = $request->max;

        if ($min === null) {
            $min = 0;
        }
        if ($max === null) {
            $max = 5;
        }

        $myFavorites = Auth::user()->favorites()->whereBetween('rating', array($min, $max))->get();

        $id = $profileuser->id;

        if ($id === auth()->id()) {
            $eigenesprofil = 'true';
        } else {
            $eigenesprofil = 'false';
        }

        return view('frontend.profile.show', compact('profileuser', 'myFavorites', 'profilepicture', 'user', 'eigenesprofil'));
    }
    public function edit($name){
        $profileuser = User::where('userName', $name)->first();
        $user = Auth::user();
        if (!$profileuser) {
          return back();
        }
        return view('frontend.profile.edit', compact('profileuser'));
    }
    public function update(Request $request){

        // $v = Validator::make($request->all(), [
        // 'userName' => 'required',
        // 'firstName' => 'required',
        //  'lastName' => 'required',
        //  'email' => 'required|email',
        //  'role' => 'required|numeric',
        // ]);

        // if ($v->fails())
        // {
        //     return redirect()->back()->withErrors($v->errors());
        // }

        $birthdate = $request->input('birthdate');
        $birthdate = date('d.m.Y', strtotime($dob));

        $user = Auth::user();
        $user->userName = $request->input('userName');
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->postalCode = $request->input('postalCode');
        $user->city = $request->input('city');
        $user->birthdate = $birthdate;
        $user->publicProfile = $request->input('publicProfile');

        $user->save();

        return back();
    }
    public function storeimage(Request $request){

        if ($request->hasFile('profilePicture')) {
            $avatar = request()->file('profilePicture');
            $dt = Carbon::now();
            $current = $dt->toDateTimeString();
            $current = str_replace([':', ' '], '-', $current);
            $filename = $current . '-' . request()->user()->id . '.' . $avatar->extension();

            $path = public_path('uploads/profilePictures/' . auth()->id() . '/');

            if (!file_exists($path)) {
                 File::makeDirectory($path);
            }
            $path = public_path('uploads/profilePictures/' . auth()->id() . '/' . $filename);

            Image::make($avatar)->resize(600, null, function ($constraint) {$constraint->aspectRatio();})->save(public_path('uploads/profilePictures/' . auth()->id() . '/' . $filename));

            $user = Auth::user();
            $user->pictureName = $filename;
            $user->save();
        }
        return back();
    }
    public function destroy()
    {
        $user = Auth::user();
        $filename = $user->pictureName;

        $file = public_path('uploads/profilePictures/' . auth()->id() . '/' . $filename);

        File::delete($file);

        $user = Auth::user();
        $user->pictureName = 'placeholder-user.png';
        $user->save();

        return back();
    }
    public function confirmRegistration($confirmationCode)
        {
            //dd($confirmationCode);
            if( ! $confirmationCode)
            {
                echo "fail code";
            }

            $user = User::where('confirmationToken', $confirmationCode)->firstOrFail();

            if ( ! $user)
            {
                echo "fail user";
            }

            Auth::login($user);
            $user->isConfirmed = 1;
            $user->confirmationToken = null;
            $user->save();

            return redirect('/');
        }
}