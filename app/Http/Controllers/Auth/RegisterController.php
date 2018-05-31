<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Newsletter;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware('guest');
    }
    public function register(Request $request)
    {   
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

       
        if ($request->newsletterSubscribed = 1) {
         Newsletter::subscribe($request->email);
        }

        $request->session()->flash(
                            'alert-success',
                            'Wir haben dir eine E-Mail geschickt! Zur Bestätigung deines Profils einfach den Link in dieser anklicken und mit deinen User-Daten auf der Seite anmelden. Viel Spaß bei beachfelder.de!'
                            );
        return redirect('/');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'userName' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'sex' => 'required',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $code = str_random(30);

          //send confirmationen mail
        $confirmation_code = ['foo' => $code];
        $email = $data['email'];
        $name = $data['userName'];
        Mail::send('email.verify', $confirmation_code, function($message) use ($email, $name) {
            $message->to($email, $name)->from('noreply@beachfelder.de', 'beachfelder.de')->replyTo('noreply@beachfelder.de', 'beachfelder.de')->subject('Registrierung abschließen');
        });

          //create user
        return User::create([
            'userName' => $data['userName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'postalCode' => $data['postalCode'],
            'city' => $data['city'],
            'sex' => $data['sex'],
            'birthdate' => $data['birthdate'],
            'confirmationToken' => $code,
        ]);

    }
}
