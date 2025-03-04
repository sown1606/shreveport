<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Models\User as VoyagerUser;

class User extends VoyagerUser
{
    use Notifiable;

    /**
     * Các cột được phép gán qua mass assignment.
     */
    protected $fillable = [
        // Bắt buộc
        'role_id',
        'Player_ID',   // Account ID người chơi
        'FName',
        'LName',
        'Fullname',
        'email',
        'password',
        'DOB',

        // Tuỳ chọn
        'avatar',
        'settings',
        'secure_question1',
        'secure_question2',
        'secure_question3',
        'secure_answer1',
        'secure_answer2',
        'secure_answer3',
        'test_account_flg',  // Nếu hệ thống dùng cờ này

        // Lưu ý: email_verified_at, remember_token, created_at, updated_at
        // thường do Eloquent tự xử lý. Nếu bạn muốn mass-assign, có thể thêm:
        // 'email_verified_at', 'remember_token'
        // T tuỳ theo ý muốn
    ];

    /**
     * Các cột ẩn khi query -> array/json.
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Kiểu dữ liệu cho các cột.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'DOB' => 'date',
    ];
}
