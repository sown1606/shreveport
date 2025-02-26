<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DecemberCore extends Model
{
    protected $table = 'December';
    public $timestamps = false;
    protected $primaryKey = 'CSHRV_Account';
    public $incrementing = false;
}

