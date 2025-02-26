<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class JanuaryCore extends Model
{
    protected $table = 'January';
    public $timestamps = false;
    protected $primaryKey = 'CSHRV_Account';
    public $incrementing = false;
}

