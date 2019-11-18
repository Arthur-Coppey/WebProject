<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\reportEvent;

class SendReport extends Controller
{
    public function mailsend()
    {
        $details = $_SERVER["REQUEST_URI"];
    

        \Mail::to('serverBDE@BDEbordeaux.com')->send(new reportEvent($details));
        return view('/emails/successReport');
    }
}
