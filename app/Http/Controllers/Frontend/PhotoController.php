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

class PhotoController extends Controller
{

    public function store(Request $request)
    {
        if ($request->hasFile('photos')) {

            $v = Validator::make($request->all(), [
                'photos' => 'required',
                'photos.*' => 'image|mimes:jpeg,jpg,png|max:1000',
            ]);

            if ($v->fails())
            {
                return redirect()->back()->withErrors($v->errors());
            }

            $photos = request()->file('photos');

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
                    'path' => $path
                ]);
                
                

            }


   
        }
        return back();
    }

}
