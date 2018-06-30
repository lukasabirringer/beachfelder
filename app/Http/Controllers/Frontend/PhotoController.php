<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Beachcourt;
use File;
use DB;
use Storage;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;
use Mail;

class PhotoController extends Controller
{

    public function store(Request $request)
    {
        if ($request->hasFile('photos')) {

            $v = Validator::make($request->all(), [
                'photos' => 'required',
                'photos.*' => 'image|mimes:jpeg,jpg,JPG,png|max:3000',
            ]);

            if ($v->fails())
            {
                //return redirect()->back()->withErrors($v->errors());
                return redirect()->back()->with('error', 'Dein Upload enspricht leider nicht unseren Vorgaben. Bitte überprüfe den Upload und versuche es erneut.');
            }

            $photos = request()->file('photos');
            $contestParticipation = $request->contestParticipation;
           
            $i = 0;

            foreach ($request->file('photos') as $photo) {
                
                $beachcourtId = $request->beachcourtId;

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
        $userName = $user->userName;
        $name = $user->firstName;
        $beachcourt = Beachcourt::where('id', $beachcourtId)->first();
        $beachcourtId = $beachcourt->id;
        $beachcourtZip = $beachcourt->postalCode;
        $beachcourtCity = $beachcourt->city;
        $beachcourtStreet = $beachcourt->street;
        $beachcourtHouseNumber = $beachcourt->houseNumber;
        
        $email = $user->email;
        $code = str_random(30);

        $data = array(
            'userName' => $userName,
            'emailAddress' => $email,
            'beachcourt' => $beachcourtId,
            'beachcourtZip' => $beachcourtZip,
            'beachcourtCity' => $beachcourtCity,
            'beachcourtStreet' => $beachcourtStreet,
            'beachcourtHouseNumber' => $beachcourtHouseNumber,
        );

          //send confirmationen mail
        $confirmation_code = ['foo' => $code];

        Mail::send('email.photoUpload', $confirmation_code, function($message) use ($email, $name) {
            $message->from('noreply@beachfelder.de', 'beachfelder.de');
            $message->to($email, $name)->subject('beachfelder.de // Vielen Dank für den Foto-Upload');
        });

        Mail::send('email.photoUploadInternal', $data, function($message) use ($email) {
            $message->from('noreply@beachfelder.de', 'beachfelder.de');
            $message->to('presse@beachfelder.de')->subject('beachfelder.de // Neuer Bild-Upload');
        });

        return redirect()->back()->with('success', 'Vielen Dank, dass du uns Bilder gesendet hast!');
    }

}
