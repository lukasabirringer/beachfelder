<?php

namespace App\Http\Controllers\Frontend;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use App\Beachcourt;
use DB;

class SearchController extends Controller
{
    public function show(Request $request)
    {

        $plz = $request->postcode ?? '75233';;
        $distance = $request->distance ?? '15';

        $validator = Validator::make($request->all(), [
            'postcode' => 'min:4',
        ]);
        if ($validator->fails()) {
         return redirect('/')->withErrors($validator, 'postcode');
        }

        require_once(app_path() . '/plz/ogdbPLZnearby2.lib.php');
        require_once(app_path() . '/plz/plzToCity.php');

        $citylonglat = ($plzToCity[$plz]);

        $latitude = $citylonglat[1];
        $longitude = $citylonglat[2];

        $ratingmin = $request->ratingmin ?? '1';
        $ratingmax = $request->ratingmax ?? '5';
        $isPublic = $request->isPublic;
        $isChargeable = $request->isChargeable;

        if ($request->has('isPublic') && $request->has('isChargeable')) {
            $results = Beachcourt::where('submitState', 'approved')
               ->whereBetween('latitude', array(($latitude - ($distance*0.0117)), ($latitude + ($distance*0.0117))))
               ->whereBetween('longitude', array(($longitude - ($distance*0.0117)), ($longitude + ($distance*0.0117))))
               ->where('isPublic', '=', $isPublic)
               ->where('isChargeable', '=', $isChargeable)
               ->whereBetween('rating', array($ratingmin, $ratingmax ))
               ->orWhere('ratingCount', '=', '0')
               ->Paginate(6);
        } else {
            $results = Beachcourt::where('submitState', 'approved')
               ->whereBetween('latitude', array(($latitude - ($distance*0.0117)), ($latitude + ($distance*0.0117))))
               ->whereBetween('longitude', array(($longitude - ($distance*0.0117)), ($longitude + ($distance*0.0117))))
               ->whereBetween('rating', array($ratingmin, $ratingmax ))
               ->orWhere('ratingCount', '=', '0')
               ->Paginate(6);
        }

        return view('frontend.search.show', compact('isChargeable', 'isPublic', 'results', 'latitude', 'longitude', 'plz', 'distance', 'ratingmin', 'ratingmax'));
    }

}
