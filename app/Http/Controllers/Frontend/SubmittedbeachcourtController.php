<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\User;
use App\Favorites;
use App\Footernavigation;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Storage;
use File;
use Image;
use App\Beachcourt;
use Mail;

class SubmittedbeachcourtController extends Controller
{
    public function submit()
    {
        $user_id = Auth::id();

        $submittedBeachcourts = Beachcourt::where('user_id', $user_id)->get();

        return view('frontend.beachcourt.submit', compact('submittedBeachcourts'));
    }
    public function destroy(Request $request, $id)
    {
        $beachcourt = Beachcourt::findOrFail($id);
        $beachcourt->delete();

        $request->session()->flash(
                            'alert-success',
                            'Das eingereichte Beachfeld wurde erfolgreicht entfernt!'
                            );

        return back();
    }
    public function store(Request $request)
    {

        $user_id = Auth::id();
        $date = Carbon::now()->toDateTimeString();

        $v = Validator::make($request->all(), [
        'postalCode' => 'required',
         'latitude' => 'required',
         'longitude' => 'required',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

        DB::table('beachcourts')->insert(
            ['user_id' => $user_id,
             'postalCode' => $request->postalCode,
             'city' => $request->city,
             'street' => $request->street,
             'houseNumber' => $request->houseNumber,
             'latitude' => $request->latitude,
             'longitude' => $request->longitude,
             'operator' => $request->operator,
             'isChargeable' => $request->isChargeable,
             'notes' => $request->notes,
             'courtCountOutdoor' => $request->courtCountOutdoor,
             'courtCountIndoor' => $request->courtCountIndoor,
             'isPublic' => $request->isPublic,
             'submitState' => 'eingereicht',
             'created_at' => $date]
        );

        $user = Auth::user();

        $email = $user->email;
        $name = $user->firstName;
        $code = str_random(30);

          //send confirmationen mail
        $confirmation_code = ['foo' => $code];

        Mail::send('email.submitCourt', $confirmation_code, function($message) use ($email, $name) {
            $message->from('hello@beachfelder.de', 'Beachfelder.de');
            $message->bcc('lukas.a.birringer@gmail.com', $name = null);
            $message->to($email, $name)->subject('beachfelder.de // Beachfeld eingereicht');
        });

       return redirect()->back()->with('success', 'Beachfeld wurde eingereicht');

    }
}
