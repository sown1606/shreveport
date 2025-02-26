<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AugustCore extends Model
{
    protected $table = 'August';
    public $timestamps = false;
    protected $primaryKey = 'CSHRV_Account';
    public $incrementing = false;
}

