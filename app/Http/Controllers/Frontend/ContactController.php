<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Mail;
use App\Rules\Captcha;

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
      'g-recaptcha-response' => new Captcha()
      ]);

      if ($v->fails())
      {
          return redirect()->back()->withErrors($v->errors());
      }

      $user = Auth::user();
      $email = $request->userEmail;
      $date = Carbon::now()->toDateTimeString();

      DB::table('contact')->insert(
            ['userName' => 'null',
             'userEmail' => $email,
             'subject' => $request->subject,
             'message' => $request->message,
             'created_at' => $date]
        );

      $email1 = 'pecherfabian@gmail.com';
      $email2 = 'lukas.a.birringer@gmail.com';

      $data = array(
          'e' => $request->userEmail,
          's' => $request->subject,
          'm' => $request->message,
      );
      Mail::send('email.contact', $data, function($message) use ($email1, $email2) {
            $message->from('hello@beachfelder.de', 'beachfelder.de');
            $message->to($email1)->subject('Neue Anfrage auf beachfelder.de');
            $message->to($email2)->subject('Neue Anfrage auf beachfelder.de');
        });

      return redirect()->back()->with('success', 'Wir haben deine Nachricht erhalten');
    }
}
