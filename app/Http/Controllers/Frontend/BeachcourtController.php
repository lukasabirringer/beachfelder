<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Beachcourt;
use App\Favorites;
use App\Rating;
use File;
use DB;
use Storage;
use Auth;
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

class BeachcourtController extends Controller
{
    public function show($cityslug, $latitude, $longitude)
    {
        $beachcourt = Beachcourt::where('latitude', $latitude)->where('longitude', $longitude)->first();

        $lang = 'de';
        $units = 'metric';
        $owm = new OpenWeatherMap('b8139c4415c13e5d46c12b08d1a379d3');
        $zip = $beachcourt->postalCode;
        try {
            $weather = $owm->getWeather('zip:'.$zip.',DE', $units, $lang);
        } catch(OWMException $e) {
            echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        } catch(\Exception $e) {
            echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        }

        $roundedWheater = number_format($weather->temperature->getValue(), 1);
        $icon = substr($weather->weather->icon, 0, -1);
        $iconTime = substr($weather->weather->icon, 2);

        switch ($icon) {
            case '01':
                $icon = 'sun';
                break;
            case '02':
                $icon = 'cloud';
                break;
            case '03':
                $icon = 'cloud';
                break;
            case '04':
                $icon = 'cloud';
                break;
            case '09':
                $icon = 'cloud-rain';
                break;
            case '10':
                $icon = 'cloud-rain';
                break;
            case '11':
                $icon = 'cloud-lightning';
                break;
            case '13':
                $icon = 'cloud-snow';
                break;
            case '50':
                $icon = 'wind';
        }

        $distance = '15';
        $otherBeachcourts = Beachcourt::where('submitState', 'approved')
           ->whereBetween('latitude', array(($latitude - ($distance*0.0117)), ($latitude + ($distance*0.0117))))
           ->whereBetween('longitude', array(($longitude - ($distance*0.0117)), ($longitude + ($distance*0.0117))))
           ->limit(6)
           ->get();

        if (is_dir(public_path('uploads/beachcourts/' . $beachcourt->id . '/slider/standard/'))) {
        $path = public_path('uploads/beachcourts/' . $beachcourt->id . '/slider/standard/');
        $files = File::allFiles($path);
        $filecount = count($files);
        }
        else {
            $filecount = 0;
        }

        return view('frontend.beachcourt.show', compact('filecount', 'otherBeachcourts', 'beachcourt', 'roundedWheater', 'weather', 'icon', 'pictures'));
    }
    public function rate($cityslug, $latitude, $longitude)
    {
        $beachcourt = Beachcourt::where('latitude', $latitude)->where('longitude', $longitude)->first();

        $beachcourt_id = $beachcourt->id;

        $user_id = Auth::id();
        $alreadyrated = Rating::where('user_id', $user_id)->where('beachcourt_id', $beachcourt_id)->first();

        if ($alreadyrated == null) {
         return view('frontend.beachcourt.rate', compact('beachcourt'));
        }
        return redirect()->back()->with('error', 'Du hast dieses Feld bereits bewertet - Falls das Feld verbessert wurde, informiere uns darüber und du kannst es erneut bewerten!');

    }
    public function favoriteBeachcourt(Beachcourt $beachcourt)
    {
        Auth::user()->favorites()->attach($beachcourt->id);

        return back();
    }

    public function unFavoriteBeachcourt(Beachcourt $beachcourt)
    {
        Auth::user()->favorites()->detach($beachcourt->id);

        return back();
    }
}
