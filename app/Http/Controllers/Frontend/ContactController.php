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
            ['userEmail' => $email,
             'subject' => $request->subject,
             'message' => $request->message,
             'created_at' => $date]
        );

      $email = 'presse@beachfelder.de';

      $data = array(
          'e' => $request->userEmail,
          's' => $request->subject,
          'm' => $request->message,
      );
      Mail::send('email.contact', $data, function($message) use ($email) {
            $message->from('noreply@beachfelder.de', 'beachfelder.de');
            $message->to($email)->subject('Neue Anfrage auf beachfelder.de');
        });

      return redirect()->back()->with('success', 'Wir haben deine Nachricht erhalten');
    }
}
