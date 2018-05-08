<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Mail;

class ContactController extends Controller
{
    public function show()
    {
      return view('frontend.page.contact', compact('otherBeachcourts'));
    }
     public function save(Request $request)
    {
      $v = Validator::make($request->all(), [
      'subject' => 'required',
      'message' => 'required',
      ]);

      if ($v->fails())
      {
          return redirect()->back()->withErrors($v->errors());
      }

      $user = Auth::user();
      $name = $user->userName;
      $email = $user->email;
      $date = Carbon::now()->toDateTimeString();

      DB::table('contact')->insert(
            ['userName' => $name,
             'userEmail' => $email,
             'subject' => $request->subject,
             'message' => $request->message,
             'created_at' => $date]
        );

      $email1 = 'pecherfabian@gmail.com';
      $email2 = 'lukas.a.birringer@gmail.com';

      $data = array(
          'n' => $name,
          's' => $request->subject,
          'm' => $request->message,
      );
      Mail::send('email.contact', $data, function($message) use ($email1, $email2, $name) {
            $message->from('hello@beachfelder.de', 'beachfelder.de');
            $message->to($email1, $name)->subject('Neue Anfrage auf beachfelder.de');
            $message->to($email2, $name)->subject('Neue Anfrage auf beachfelder.de');
        });

      return redirect()->back()->with('success', 'Wir haben deine Nachricht erhalten');
    }
}
