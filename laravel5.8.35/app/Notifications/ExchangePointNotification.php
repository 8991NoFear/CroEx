<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ExchangePointNotification extends Notification
{
    use Queueable;

    public $ntfmsg;

    public function __construct($ntfmsg)
    {
        $this->ntfmsg = $ntfmsg;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            'point'     => $this->ntfmsg['point'],
            'type'      => $this->ntfmsg['type'],
        ];
    }
}
