<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MayCore extends Model
{
    protected $table = 'May';
    public $timestamps = false;
    protected $primaryKey = 'CSHRV_Account';
    public $incrementing = false;
}

