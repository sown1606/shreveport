<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MarchCore extends Model
{
    protected $table = 'March';
    public $timestamps = false;
    protected $primaryKey = 'CSHRV_Account';
    public $incrementing = false;
}

