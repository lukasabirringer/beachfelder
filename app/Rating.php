<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function beachcourts()
    {
        return $this->belongsTo('App\Beachcourt');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
    'sandQuality',
    'courtTopography',
    'sandDepth',
    'irrigationSystem',
    'netHeight',
    'netType',
    'netAntennas',
    'netTension',
    'boundaryLines',
    'fieldDimensions',
    'securityZone',
    'windProtection',
    'interferenceCourt',
     ];
}
