<?php


namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class MarsRoverPhoto extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'img_id', 'img_src','earth_date'
    ];

}
