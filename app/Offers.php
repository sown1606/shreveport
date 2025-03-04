<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Offers';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Player_ID',
        'FName',
        'LName',
        'Job_Number',
        'Label',
        'Expire',
        'Casino_Code',
        'Job_Type',
        'Panels',
        'Position',
        'Page01',
        'Page02',
        'Page03',
        'Page04',
        'Page05',
        'Page06',
        'Page07',
        'Page08',
        'Page09',
        'Page10',
        'Page11',
        'Page12',
        'Page13',
        'Page14',
        'Page15',
        'Page16',
        'Page17',
        'Page18',
        'Page19',
        'Page20',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'Expire' => 'date', // Cast 'Expire' column to date type
    ];
}
