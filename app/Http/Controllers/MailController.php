<?php

namespace App\Http\Controllers;

use Mailgun\Mailgun;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendmail()
    {
        $subject = "This is a subject";
        $text = "lorem";

        $mg = Mailgun::create(env("MAIL_APIKEY"));

        $mg->messages()->send(
            env("MAIL_DOMAIN"),
            [
                "from" => 'postmaster@sandbox60e80803d31a400ba4a1124f69018c12.mailgun.org',
                "to" => "markolofernes52615@gmail.com",
                "subject" => $subject,
                'text' => $text
            ]
        );

    }
}