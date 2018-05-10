<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Nexmo;

class NotificationController extends Controller
{

    public function sendSMS()
    {
       Nexmo::message()->send([
            'to'   => '+491771493095',
            'from' => 'beachfelder.de',
            'text' => 'Hallo Freund! Hier der Link zum Beachfeld in Tiefenbronn: https://tinyurl.com/yamyv7tv'
        ]);
    }
}
