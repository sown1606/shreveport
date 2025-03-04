<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Data extends Model
{
    protected $primaryKey = 'Player_ID';
    protected $table = 'Datas';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;
}

