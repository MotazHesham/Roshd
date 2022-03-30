<?php

namespace App\Http\Controllers\Traits;

use App\Events\NotificationEvent;
use App\Models\UserAlert;

trait push_notification
{

    public function send_notification( $alert_text , $alert_link , $type , $data , $user_id = null)
    {
        $userAlert = UserAlert::create([
            'alert_text' => $alert_text,
            'alert_link' => $alert_link,
            'type' => $type,
        ]);

        if($user_id != null){
            $userAlert->users()->sync($user_id);
        }

        $data = [
            'id' => $userAlert->id,
            'alert_text' => $alert_text,
            'alert_link' => $alert_link,
            'type' => $type,
            'data' => $data,
        ];
        event(new NotificationEvent($data));
    }
}
