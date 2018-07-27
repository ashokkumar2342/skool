<?php

namespace App\Listeners;

use App\Events\UserActivity;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Auth;
use App\Model\Activity;


class UserActivityListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserActivity  $event
     * @return void
     */
    public function handle(UserActivity $event)
    {
         Log::info($event->message);
         $admin = Auth::guard('admin')->user();
        $data = new Activity();
        $data->admin_id = $admin->id;
        $data->message = $event->message;
        $data->save();
         
    }
}
