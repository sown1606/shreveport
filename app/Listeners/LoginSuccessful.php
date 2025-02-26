<?php

namespace App\Listeners;

use App\Reporting;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginSuccessful
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
     * @param IlluminateAuthEventsLogin $event
     * @return void
     */
    public function handle(Login $event)
    {
        if($event->user->role_id === 2 && $event->user->test_account_flg === 0)
        {
            $today = Carbon::now()->toDateString();
            $report = Reporting::where('user_id', $event->user->id)->where('date_login', $today)->first();
            if ($report){
                $report->count_login++;
                $report->save();
            }
            else
                $newReport = Reporting::create(
                    [   'user_id'=> $event->user->id,
                        'count_login'=> 1,
                        'account_combined'=> $event->user->CSHRV_Player_ID,
                        'date_login'=> $today
                    ]
                );
        }
    }
}
