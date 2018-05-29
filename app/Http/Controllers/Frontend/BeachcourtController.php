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

use Newsletter;

class BeachcourtController extends Controller
{
    public function show($cityslug, $latitude, $longitude)
    {
        // if ($request->newsletterSubscribed === 1) {
        //  Newsletter::subscribe('ulkas.birringer@dasdsd.de');
        // }

        Newsletter::subscribe('ulkas.birringer@dasdsd.de');

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

        foreach ($otherBeachcourts as $otherBeachcourt) {
          $pi80 = M_PI / 180;
          $lat1 = $latitude; $lat1 *= $pi80;
          $lng1 = $longitude; $lng1 *= $pi80;
          $lat2 = $otherBeachcourt->latitude; $lat2 *= $pi80;
          $lng2 = $otherBeachcourt->longitude; $lng2 *= $pi80;
          $r = 6372.797; // mean radius of Earth in km
          $dlat = $lat2 - $lat1; $dlng = $lng2 - $lng1;
          $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
          $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
          $dis = $r * $c * 0.621371192 * 2;
          
          $otherBeachcourt->distance = $dis;
        }
        
        $otherBeachcourts = $otherBeachcourts->sortBy('distance');

        if (is_dir(public_path('uploads/beachcourts/' . $beachcourt->id . '/slider/standard/'))) {
        $path = public_path('uploads/beachcourts/' . $beachcourt->id . '/slider/standard/');
        $files = File::allFiles($path);
        $filecount = count($files);
        }
        else {
            $filecount = 0;
        }
        
        return view('frontend.beachcourt.show', compact('filecount', 'otherBeachcourts', 'beachcourt', 'roundedWheater', 'weather', 'icon', 'pictures', 'distance'));
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
