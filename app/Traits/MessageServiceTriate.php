<?php

namespace App\Traits;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Notification;

trait MessageServiceTrait {


    public function sendEmail($messageData=[], $to_email, $view_path){
        Mail::send($view_path, $messageData, function ($message) use ($to_email) {
            $message->to($to_email)->subject("Email From TechRepublic Official Site");
        });
    }

}
