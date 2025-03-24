<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'Answers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'Survey_id',
        'Player_ID',
        'Answer_01',
        'Answer_02',
        'Answer_03',
        'Answer_04',
        'Answer_05'
    ];
}
