<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Beachcourt;
use App\Rating;
use Auth;

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
            $user_id = Auth::id();

            $newRating = $beachcourt->ratings()->create([
                'user_id' => $user_id,
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

            $userRating =    ($sandQuality +
                                $courtTopography +
                                $sandDepth +
                                $irrigationSystem +
                                $netHeight +
                                $netType +
                                $netAntennas +
                                $netTension +
                                $boundaryLines +
                                $fieldDimensions +
                                $securityZone +
                                $windProtection +
                                $interferenceCourt);

            if ($userRating >= 90 && $userRating <= 100) {
                $userRating = 5;
            } elseif ($userRating >= 80 && $userRating <= 90) {
                $userRating = 4;
            } elseif ($userRating >= 70 && $userRating <= 80) {
                $userRating = 3;
            } elseif ($userRating >= 60 && $userRating <= 70) {
                $userRating = 2;
            } elseif ($userRating >= 50 && $userRating <= 60) {
                $userRating = 1;
            } elseif ($userRating >= 0 && $userRating <= 50) {
                $userRating = 0;
            }
        DB::table('beachcourts')->whereid($beachcourtid)->increment('ratingCount');
        $ratingcount = $beachcourt->ratingCount;
        if ($ratingcount >= 10) {

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

            $newSandRating = ($sandQualityAverage + $courtTopographyAverage + $sandDepthAverage + $irrigationSystemAverage);
            if ($newSandRating >= 30.6 && $newSandRating <= 34) {$newSandRating = 5;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingSand' => $newSandRating]);
            } elseif ($newSandRating >= 27.2 && $newSandRating <= 30.6) {$newSandRating = 4;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingSand' => $newSandRating]);
            } elseif ($newSandRating >= 23.8 && $newSandRating <= 27.2) {$newSandRating = 3;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingSand' => $newSandRating]);
            } elseif ($newSandRating >= 20.4 && $newSandRating <= 23.8) {$newSandRating = 2;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingSand' => $newSandRating]);
            } elseif ($newSandRating >= 17 && $newSandRating <= 20.4) {$newSandRating = 1;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingSand' => $newSandRating]);
            } elseif ($newSandRating >= 0 && $newSandRating <= 17) {$newSandRating = 0;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['rating' => $newSandRating]);
            }

            $newNetRating = ($netHeightAverage + $netTypeAverage + $netAntennasAverage + $netTensionAverage);
            if ($newNetRating >= 25.2 && $newNetRating <= 28) {$newNetRating = 5;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingNet' => $newNetRating]);
            } elseif ($newNetRating >= 22.4 && $newNetRating <= 25.2) {$newNetRating = 4;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingNet' => $newNetRating]);
            } elseif ($newNetRating >= 19.6 && $newNetRating <= 22.4) {$newNetRating = 3;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingNet' => $newNetRating]);
            } elseif ($newNetRating >= 16.8 && $newNetRating <= 19.6) {$newNetRating = 2;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingNet' => $newNetRating]);
            } elseif ($newNetRating >= 14 && $newNetRating <= 16.8) {$newNetRating = 1;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingNet' => $newNetRating]);
            } elseif ($newNetRating >= 0 && $newNetRating <= 14) {$newNetRating = 0;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingNet' => $newNetRating]);
            }

            $newCourtRating = ($boundaryLinesAverage + $fieldDimensionsAverage + $securityZoneAverage);
            if ($newCourtRating >= 24.3 && $newCourtRating <= 27) {$newCourtRating = 5;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingCourt' => $newCourtRating]);
            } elseif ($newCourtRating >= 21.6 && $newCourtRating <= 24.3) {$newCourtRating = 4;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingCourt' => $newCourtRating]);
            } elseif ($newCourtRating >= 18.9 && $newCourtRating <= 21.6) {$newCourtRating = 3;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingCourt' => $newCourtRating]);
            } elseif ($newCourtRating >= 16.2 && $newCourtRating <= 18.9) {$newCourtRating = 2;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingCourt' => $newCourtRating]);
            } elseif ($newCourtRating >= 13.5 && $newCourtRating <= 16.2) {$newCourtRating = 1;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingCourt' => $newCourtRating]);
            } elseif ($newCourtRating >= 0 && $newCourtRating <= 13.5) {$newCourtRating = 0;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingCourt' => $newCourtRating]);
            }

            $newEnvironmentRating = ($windProtectionAverage + $interferenceCourtAverage);
            if ($newEnvironmentRating >= 9.9 && $newEnvironmentRating <= 11) {$newEnvironmentRating = 5;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingEnvironment' => $newEnvironmentRating]);
            } elseif ($newEnvironmentRating >= 8.8 && $newEnvironmentRating <= 9.9) {$newEnvironmentRating = 4;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingEnvironment' => $newEnvironmentRating]);
            } elseif ($newEnvironmentRating >= 7.7 && $newEnvironmentRating <= 8.8) {$newEnvironmentRating = 3;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingEnvironment' => $newEnvironmentRating]);
            } elseif ($newEnvironmentRating >= 6.6 && $newEnvironmentRating <= 7.7) {$newEnvironmentRating = 2;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingEnvironment' => $newEnvironmentRating]);
            } elseif ($newEnvironmentRating >= 5.5 && $newEnvironmentRating <= 6.6) {$newEnvironmentRating = 1;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingEnvironment' => $newEnvironmentRating]);
            } elseif ($newEnvironmentRating >= 0 && $newEnvironmentRating <= 5.5) {$newEnvironmentRating = 0;
                DB::table('beachcourts')->where('id', $beachcourtid)->update(['ratingEnvironment' => $newEnvironmentRating]);
            }

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
        }
            $newRating = $beachcourt->rating;

            return view('frontend.beachcourt.thanksrate',compact('userRating', 'newRating', 'beachcourt'));
        }
}
