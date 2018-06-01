<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function beachcourts()
    {
        return $this->belongsTo('App\Beachcourt');
    }

    protected $fillable = [
    'user_id',
    'file',
    'path'
     ];
}
