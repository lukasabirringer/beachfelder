<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Beachcourt;
use App\Rating;

class RatingController extends Controller
{
    public function store(Request $request)
        {
            $sandQuality = $request->sandQuality;
            $courtTopography = $request->courtTopography;
            $sandDepth = $request->sandDepth;
            $irrigationSystem = $request->irrigationSystem;
            $netHeight = $request->netHeight;
            $netType = $request->netType;
            $netAntennas = $request->netAntennas;
            $netTension = $request->netTension;
            $boundaryLines = $request->boundaryLines;
            $fieldDimensions = $request->fieldDimensions;
            $securityZone = $request->securityZone;
            $windProtection = $request->windProtection;
            $interferenceCourt = $request->interferenceCourt;

            $beachcourtid = $request->beachcourtname;
            $beachcourt = Beachcourt::where('id', $beachcourtid)->first();

            $newRating = $beachcourt->ratings()->create([
                'sandQuality' => $sandQuality,
                'courtTopography' => $courtTopography,
                'sandDepth' => $sandDepth,
                'irrigationSystem' => $irrigationSystem,
                'netHeight' => $netHeight,
                'netType' => $netType,
                'netAntennas' => $netAntennas,
                'netTension' => $netTension,
                'boundaryLines' => $boundaryLines,
                'fieldDimensions' => $fieldDimensions,
                'securityZone' => $securityZone,
                'windProtection' => $windProtection,
                'interferenceCourt' => $interferenceCourt,
            ]);

            $sandQualityAverage = $beachcourt->ratings()->avg('sandQuality');
            $courtTopographyAverage = $beachcourt->ratings()->avg('courtTopography');
            $sandDepthAverage = $beachcourt->ratings()->avg('sandDepth');
            $irrigationSystemAverage = $beachcourt->ratings()->avg('irrigationSystem');
            $netHeightAverage = $beachcourt->ratings()->avg('netHeight');
            $netTypeAverage = $beachcourt->ratings()->avg('netType');
            $netAntennasAverage = $beachcourt->ratings()->avg('netAntennas');
            $netTensionAverage = $beachcourt->ratings()->avg('netTension');
            $boundaryLinesAverage = $beachcourt->ratings()->avg('boundaryLines');
            $fieldDimensionsAverage = $beachcourt->ratings()->avg('fieldDimensions');
            $securityZoneAverage = $beachcourt->ratings()->avg('securityZone');
            $windProtectionAverage = $beachcourt->ratings()->avg('windProtection');
            $interferenceCourtAverage = $beachcourt->ratings()->avg('interferenceCourt');
            //dd($fieldDimensionsAverage);
            $newSandRating = ($sandQualityAverage +
                          $courtTopographyAverage +
                          $sandDepthAverage +
                          $irrigationSystemAverage);

            $newNetRating = ($netHeightAverage +
                          $netTypeAverage +
                          $netAntennasAverage +
                          $netTensionAverage);

            $newCourtRating = ($boundaryLinesAverage +
                          $fieldDimensionsAverage +
                          $securityZoneAverage);

            $newEnvironmentRating = ($windProtectionAverage +
                          $interferenceCourtAverage);

            DB::table('beachcourts')->where('id', $beachcourtid)
                                    ->update([
                                        'ratingSand' => $newSandRating,
                                        'ratingNet' => $newNetRating,
                                        'ratingCourt' => $newCourtRating,
                                        'ratingEnvironment' => $newEnvironmentRating
                                    ]);

            $newRating = ($sandQualityAverage +
                          $courtTopographyAverage +
                          $sandDepthAverage +
                          $irrigationSystemAverage +
                          $netHeightAverage +
                          $netTypeAverage +
                          $netAntennasAverage +
                          $netTensionAverage +
                          $boundaryLinesAverage +
                          $fieldDimensionsAverage +
                          $securityZoneAverage +
                          $windProtectionAverage +
                          $interferenceCourtAverage);

            if ($newRating >= 90 && $newRating <= 100) {
                $newRating = 5;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['rating' => $newRating]);
            } elseif ($newRating >= 80 && $newRating <= 90) {
                $newRating = 4;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['rating' => $newRating]);
            } elseif ($newRating >= 70 && $newRating <= 80) {
                $newRating = 3;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['rating' => $newRating]);
            } elseif ($newRating >= 60 && $newRating <= 70) {
                $newRating = 2;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['rating' => $newRating]);
            } elseif ($newRating >= 50 && $newRating <= 60) {
                $newRating = 1;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['rating' => $newRating]);
            } elseif ($newRating >= 0 && $newRating <= 50) {
                $newRating = 0;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['rating' => $newRating]);
            }

            DB::table('beachcourts')->where('id', $beachcourtid)->increment('ratingCount');

            $request->session()->flash(
                            'alert-success',
                            'Danke für das Bewerten des Beachfeldes :)'
                            );
            return back();

        }
}
