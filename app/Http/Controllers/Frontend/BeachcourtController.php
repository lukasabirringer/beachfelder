<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Beachcourt;
use App\Favorites;
use App\Rating;
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
        //wettaaaa
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

        if($icon === '01') {
            $icon = 'sun';
            if ($iconTime === 'n') {
                $icon = 'moon';
            }
        }elseif($icon === '02' || $icon === '03' || $icon === '04') {
            $icon = 'cloud';
        }elseif ($icon === '09' || === '10') {
            $icon = 'cloud-rain';
        }elseif ($icon === '11') {
            $icon = 'cloud-lightning';
        }elseif ($icon === '13') {
            $icon = 'cloud-snow';
        }

        if (!file_exists(public_path('uploads/beachcourts/' . $beachcourt->id . '/1.jpg'))) {
             $pictures = 'false';
        } else {
             $pictures = 'true';
        }

        return view('frontend.beachcourt.show', compact('beachcourt', 'roundedWheater', 'weather', 'icon', 'pictures'));
    }
    public function rate($cityslug, $latitude, $longitude)
    {
        $beachcourt = Beachcourt::where('latitude', $latitude)->where('longitude', $longitude)->first();

        return view('frontend.beachcourt.rate', compact('beachcourt'));
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
