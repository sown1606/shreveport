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
     * @param \Illuminate\Auth\Events\Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        // role_id = 2 (có thể là role “player”)
        // test_account_flg = 0 (chỉ track nếu tài khoản không phải "test")
        if($event->user->role_id === 2 && $event->user->test_account_flg === 0)
        {
            $today = Carbon::now()->toDateString();

            // firstOrCreate: nếu chưa có dòng nào (user_id, date_login này) thì tạo mới.
            // account_combined: gán với Player_ID của user
            $report = Reporting::firstOrCreate(
                [
                    'user_id' => $event->user->id,
                        'date_login'=> $today
                ],
                [
                    'count_login' => 0,
                    'account_combined' => $event->user->Player_ID
                    ]
                );

            // Mỗi lần đăng nhập sẽ tăng count_login thêm 1
            $report->increment('count_login');
        }
    }
}
