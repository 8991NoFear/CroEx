<?php

namespace App\Listeners;

use App\Events\ExchangePoint;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\ExchangePointNotification;

class ExchangePointListener
{
    public function __construct()
    {
        //
    }

    public function handle(ExchangePoint $event)
    {
        request()->user()->notify(new ExchangePointNotification($event->ntfmsg));
    }
}
