<?php

namespace App\Http\Controllers;

use Mailgun\Mailgun;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendmail(Request $request)
    {
        $subject = $request->subject;
        $text = $request->description;
        $emailContent = html_entity_decode($text);
        $mg = Mailgun::create(env("MAIL_APIKEY"));

        $mg->messages()->send(
            env("MAIL_DOMAIN"),
            [
                //Auth::user()->email
                "from" => 'postmaster@sandbox60e80803d31a400ba4a1124f69018c12.mailgun.org',

                // $request->user->email;
                "to" => "markolofernes52615@gmail.com",
                "subject" => $subject,
                'text' => $emailContent,
                'html' => $emailContent
            ]
        );
        return redirect()->route('home')->with('success', 'Email Sent✔');

    }
}