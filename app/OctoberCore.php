<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class OctoberCore extends Model
{
    protected $table = 'October';
    public $timestamps = false;
    protected $primaryKey = 'CSHRV_Account';
    public $incrementing = false;
}

