<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Reporting extends Model
{
    protected $table = 'Reporting';
    protected $fillable = ['user_id','count_login','date_login','account_combined'];

}

