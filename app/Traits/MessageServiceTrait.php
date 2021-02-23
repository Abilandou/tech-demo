<?php

namespace App\Traits;

use Illuminate\Support\Facades\Mail;

trait MessageServiceTrait {


    public function sendEmail($messageData=[], $to_email, $view_path){
        Mail::send($view_path, $messageData, function ($message) use ($to_email) {
            $message->to($to_email)->subject("TECHREPUBLIC OFFICIAL SITE");
        });
    }

    // public function databaseNotification($notifiable_type, $notifiable_id=null, $data, $user_id=null, $reason_id=null,  $type, $read_at=null)
    // {
    //     $notification = new Notification();
    //     $notification->notifiable_type = $notifiable_type;
    //     $notification->notifiable_id = $notifiable_id;
    //     $notification->data = $data;
    //     $notification->type = $type;
    //     $notification->user_id = $user_id;
    //     $notification->read_at = $read_at;
    //     $notification->reason_id = $reason_id;
    //     $notification->save();
    // }
}