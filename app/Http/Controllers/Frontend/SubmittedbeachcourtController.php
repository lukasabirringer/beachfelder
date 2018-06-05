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
use App\Rules\Captcha;
use App\Photo;

class SubmittedbeachcourtController extends Controller
{
    public function submit()
    {
        $user_id = Auth::id();
        $submittedCourts = Beachcourt::where('user_id', $user_id)->get();

        if (Auth::user()){
            $user = Auth::user();
            $myFavorites = $user->favorites()->get();

            return view('frontend.beachcourt.submit', compact('submittedCourts', 'myFavorites'));
        }else{
            return view('frontend.beachcourt.submit', compact('submittedCourts'));
        }
        
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
        	'postalCode' => 'required'
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
             'state' => $request->state,
             'country' => $request->country,
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
        $beachcourtId = DB::getPdo()->lastInsertId();

        $photos = request()->file('photos');
        $contestParticipation = request()->input('contestParticipation');
        $i = 0;

        if($photos != '') {
        	foreach ($request->file('photos') as $photo) {
        	
        	        $dt = Carbon::now();
        	        $current = $dt->toDateTimeString();
        	        $filename = $photo->getClientOriginalName();
        	        $filename = str_replace([':', ' ', '/'], '-', $filename);
        	        $current = str_replace([':', ' ', '/'], '-', $current);
        	        $filename = $i++ . '-' . $current . '-' . request()->user()->id . '.' . $photo->extension();

        	        $path = public_path('uploads/beachcourts/' . $beachcourtId . '/eingereicht/user-' . auth()->id() . '/');
        	        
        	        if (!file_exists($path)) {
        	             File::makeDirectory($path,0777,true);
        	        }
        	        $file = public_path('uploads/beachcourts/' . $beachcourtId . '/eingereicht/user-' . auth()->id() . '/' . $filename);

        	        $image = Image::make($photo);
        	        $image->save($file);

        	        $user_id = request()->user()->id;
        	        $beachcourt = Beachcourt::where('id', $beachcourtId)->first();

        	        $newPhoto = $beachcourt->photos()->create([
        	            'user_id' => $user_id,
        	            'file' => $filename,
        	            'path' => $path,
        	            'contestParticipation' => $contestParticipation
        	        ]);   
        	    }
        }

        

        $user = Auth::user();

        $email = $user->email;
        $name = $user->firstName;
        $code = str_random(30);

          //send confirmationen mail
        $confirmation_code = ['foo' => $code];

        Mail::send('email.submitCourt', $confirmation_code, function($message) use ($email, $name) {
            $message->from('noreply@beachfelder.de', 'beachfelder.de');
            $message->to($email, $name)->subject('beachfelder.de // Beachfeld eingereicht');
        });

       return redirect()->back()->with('success', 'Vielen Dank, dass du ein Beachvolleyballfeld eingereicht hast!');

    }
}
