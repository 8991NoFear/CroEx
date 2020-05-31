<?php

namespace App\Listeners;

use App\Events\Purchase;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\PurchaseNotification;

class PurchaseListener
{

    public function __construct()
    {
        //
    }

    public function handle(Purchase $event)
    {
        request()->user()->notify(new PurchaseNotification($event->ntfmsg));
    }
}
