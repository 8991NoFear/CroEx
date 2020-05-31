<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Purchase
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ntfmsg;

    public function __construct($ntfmsg)
    {
        $this->ntfmsg = $ntfmsg;
    }
}
