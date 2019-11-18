<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\alertPayement;

class SendMail extends Controller
{
    public function mailsend()
    {
        $details = [
            'title' => 'Title: Mail from Real Programmer',
            'body' => 'Body: This is for testing email using smtp'
        ];

        \Mail::to('serverBDE@bdebordeaux.com')->send(new alertPayement($details));
        return view('/emails/successPay');
    }
}
