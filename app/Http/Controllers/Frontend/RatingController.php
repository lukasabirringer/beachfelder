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
            //get Values
            $sandQuality = $request->sandQuality; $courtTopography = $request->courtTopography; $sandDepth = $request->sandDepth; $irrigationSystem = $request->irrigationSystem;
            $netHeight = $request->netHeight; $netType = $request->netType;$netAntennas = $request->netAntennas; $netTension = $request->netTension;
            $boundaryLines = $request->boundaryLines; $fieldDimensions = $request->fieldDimensions; $securityZone = $request->securityZone; 
            $windProtection = $request->windProtection; $interferenceCourt = $request->interferenceCourt;
            $securitySandDepth = $request->securitySandDepth; $securityJunk = $request->securityJunk; $securityCutting = $request->securityCutting; $securityBricks = $request->securityBricks;

            //identify bachcourt, user, userrole
            $beachcourt = Beachcourt::where('id', $request->beachcourtname)->first();
            $user = Auth::user();
            $user_id = $user->id;
            $userRole = $user->role;

            //get/create userrating
            $userRating =    ($sandQuality + $courtTopography + $sandDepth + $irrigationSystem +
                                $netHeight + $netType + $netAntennas + $netTension +
                                $boundaryLines + $fieldDimensions + $securityZone +
                                $windProtection + $interferenceCourt);

            if ($userRating >= 900 && $userRating <= 1000) {$userRating = 5;} 
            elseif ($userRating >= 800 && $userRating <= 900) {$userRating = 4;} 
            elseif ($userRating >= 700 && $userRating <= 800) {$userRating = 3;} 
            elseif ($userRating >= 600 && $userRating <= 700) {$userRating = 2;} 
            elseif ($userRating >= 500 && $userRating <= 600) {$userRating = 1;} 
            elseif ($userRating >= 0 && $userRating <= 500) {$userRating = 0;}

            $userRating = $userRating - $securitySandDepth - $securityJunk - $securityCutting - $securityBricks;
            if ($userRating < 0 ) { $userRating = 0; } 
            $countMinusBall = $securitySandDepth + $securityJunk + $securityCutting + $securityBricks;
            
            //save exact rating in rating db
            $newRating = $beachcourt->ratings()->create([
                'user_id' => $user_id, 
                'sandQuality' => $sandQuality, 'courtTopography' => $courtTopography, 'sandDepth' => $sandDepth, 'irrigationSystem' => $irrigationSystem,
                'netHeight' => $netHeight, 'netType' => $netType, 'netAntennas' => $netAntennas, 'netTension' => $netTension,
                'boundaryLines' => $boundaryLines, 'fieldDimensions' => $fieldDimensions, 'securityZone' => $securityZone,
                'windProtection' => $windProtection, 'interferenceCourt' => $interferenceCourt,
                'securitySandDepth' => $securitySandDepth, 'securityJunk' => $securityJunk, 'securityCutting' => $securityCutting, 'securityBricks' => $securityBricks,
            ]);

            //increase ratingcount
            DB::table('beachcourts')->whereid($request->beachcourtname)->increment('ratingCount');
            $ratingcount = $beachcourt->ratingcount;
            if ($ratingcount >= 10) {
            //get new averages for categories (sand, net, court, environment)
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
            
            //create & convert new sandRating to balls and save
            $newSandRating = ($sandQualityAverage + $courtTopographyAverage + $sandDepthAverage + $irrigationSystemAverage);
            if ($newSandRating >= 314.1 && $newSandRating <= 349) {$newSandRating = 5;} 
            elseif ($newSandRating >= 279.2 && $newSandRating <= 314.1) {$newSandRating = 4;} 
            elseif ($newSandRating >= 244.3 && $newSandRating <= 279.2) {$newSandRating = 3;} 
            elseif ($newSandRating >= 209.4 && $newSandRating <= 244.3) {$newSandRating = 2;} 
            elseif ($newSandRating >= 174.5 && $newSandRating <= 209.4) {$newSandRating = 1;} 
            elseif ($newSandRating >= 0 && $newSandRating <= 174.5) {$newSandRating = 0;}
            DB::table('beachcourts')->where('id', $request->beachcourtname)->update(['ratingSand' => $newSandRating]);
            
            //create & convert new netRating to balls and save
            $newNetRating = ($netHeightAverage + $netTypeAverage + $netAntennasAverage + $netTensionAverage);
            if ($newNetRating >= 226.8 && $newNetRating <= 252) {$newNetRating = 5;} 
            elseif ($newNetRating >= 201.6 && $newNetRating <= 226.8) {$newNetRating = 4;} 
            elseif ($newNetRating >= 176.4 && $newNetRating <= 201.6) {$newNetRating = 3;} 
            elseif ($newNetRating >= 151.2 && $newNetRating <= 176.4) {$newNetRating = 2;} 
            elseif ($newNetRating >= 126 && $newNetRating <= 151.2) {$newNetRating = 1;} 
            elseif ($newNetRating >= 0 && $newNetRating <= 126) {$newNetRating = 0;}
            DB::table('beachcourts')->where('id', $request->beachcourtname)->update(['ratingNet' => $newNetRating]);
            
            //create & convert new courtRating to balls and save
            $newCourtRating = ($boundaryLinesAverage + $fieldDimensionsAverage + $securityZoneAverage);
            if ($newCourtRating >= 268.2 && $newCourtRating <= 298) {$newCourtRating = 5;} 
            elseif ($newCourtRating >= 238.4 && $newCourtRating <= 268.2) {$newCourtRating = 4;} 
            elseif ($newCourtRating >= 208.6 && $newCourtRating <= 238.4) {$newCourtRating = 3;} 
            elseif ($newCourtRating >= 178.8 && $newCourtRating <= 208.6) {$newCourtRating = 2;} 
            elseif ($newCourtRating >= 149 && $newCourtRating <= 178.8) {$newCourtRating = 1; } 
            elseif ($newCourtRating >= 0 && $newCourtRating <= 149) {$newCourtRating = 0;}
            DB::table('beachcourts')->where('id', $request->beachcourtname)->update(['ratingCourt' => $newCourtRating]);

            //create & convert new EnvironmentRating to balls and save
            $newEnvironmentRating = ($windProtectionAverage + $interferenceCourtAverage);
            if ($newEnvironmentRating >= 90.9 && $newEnvironmentRating <= 101) {$newEnvironmentRating = 5;} 
            elseif ($newEnvironmentRating >= 80.8 && $newEnvironmentRating <= 90.9) {$newEnvironmentRating = 4;} 
            elseif ($newEnvironmentRating >= 70.7 && $newEnvironmentRating <= 80.8) {$newEnvironmentRating = 3;} 
            elseif ($newEnvironmentRating >= 60.6 && $newEnvironmentRating <= 70.7) {$newEnvironmentRating = 2;} 
            elseif ($newEnvironmentRating >= 50.5 && $newEnvironmentRating <= 60.6) {$newEnvironmentRating = 1;} 
            elseif ($newEnvironmentRating >= 0 && $newEnvironmentRating <= 50.5) {$newEnvironmentRating = 0;}
            DB::table('beachcourts')->where('id', $request->beachcourtname)->update(['ratingEnvironment' => $newEnvironmentRating]);
            
            //get average of securityquestions
            $securitySandDepthAverage = $beachcourt->ratings()->avg('securitySandDepth'); 
            $securityJunkAverage = $beachcourt->ratings()->avg('securityJunk');
            $securityCuttingAverage = $beachcourt->ratings()->avg('securityCutting'); 
            $securityBricksAverage = $beachcourt->ratings()->avg('securityBricks');

            //get average of exactrating
            $rating = ($sandQualityAverage + $courtTopographyAverage + $sandDepthAverage + $irrigationSystemAverage +
                        $netHeightAverage + $netTypeAverage + $netAntennasAverage + $netTensionAverage +
                        $boundaryLinesAverage + $fieldDimensionsAverage + $securityZoneAverage + 
                        $windProtectionAverage + $interferenceCourtAverage
                    );
            
            //round exact security average
            if($securitySandDepthAverage >= 0.5) { $securitySandDepthAverage = 1; } else {$securitySandDepthAverage = 0;}
            if($securityJunkAverage >= 0.5) { $securityJunkAverage = 1; } else {$securityJunkAverage = 0;}
            if($securityCuttingAverage >= 0.5) { $securityCuttingAverage = 1; } else {$securityCuttingAverage = 0;}
            if($securityBricksAverage >= 0.5) { $securityBricksAverage = 1; } else {$securityBricksAverage = 0;}
                        
            //create and save new overall ballrating
            if ($rating >= 900 && $rating <= 1000) { $rating = 5; } 
            elseif ($rating >= 800 && $rating <= 900) { $rating = 4; } 
            elseif ($rating >= 700 && $rating <= 800) { $rating = 3; } 
            elseif ($rating >= 600 && $rating <= 700) { $rating = 2; } 
            elseif ($rating >= 500 && $rating <= 600) { $rating = 1; } 
            elseif ($rating >= 0 && $rating <= 500) { $rating = 0; }

            //rating - security rating (in balls)
            $rating = $rating - $securitySandDepthAverage - $securityJunkAverage - $securityCuttingAverage - $securityBricksAverage;
            if ($rating < 0 ) { $rating = 0; } 

            DB::table('beachcourts')->where('id', $request->beachcourtname)->update(['rating' => $rating]);
            }
            $newRating = $beachcourt->rating;
            
            return view('frontend.beachcourt.thanksrate',compact('userRating', 'countMinusBall', 'newRating', 'beachcourt'));
        }
}