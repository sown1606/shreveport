<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = 'Survey';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'Survey_id',
        'Survey_Question_01',
        'Survey_Question_02',
        'Survey_Question_03',
        'Survey_Question_04',
        'Survey_Question_05'
    ];
}
