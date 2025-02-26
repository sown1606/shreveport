<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name','user_name','email','role_id', 'avatar', 'settings','password', 'secure_question1',
        'secure_question2','secure_question3','secure_answer1','secure_answer2','secure_answer3',
        'CSHRV_DOB',
        'CSHRV_LName',
        'CSHRV_FName',
        'CSHRV_MI',
        'CSHRV_Tier',
        'CSHRV_MTD_Points',
        'CSHRV_MTD_Points',
        'CSHRV_Points_Next_Tier',
        'CSHRV_Host_Name',
        'CSHRV_Player_ID',
        'BAC_Temp_Account_Number',
        'CSHRV_Host_ID',
        'CSHRV_Player_ID',
        'CSHRV_Account',
        'Flipbook_FName',
        'Flipbook_LName',
        'Flipbook_Tier',
        'Flipbook_Version',
        'Flipbook_FP',
        'Flipbook_Total_FP',
        'Flipbook_Food',
        'Flipbook_SBFP',
        'Flipbook_GC',
        'Flipbook_MFP',
        'Flipbook_SGC',
        'Flipbook_NC',
        'Flipbook_Hotel',
        'Flipbook_Hotel_Date_01',
        'Flipbook_Hotel_DOW',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
