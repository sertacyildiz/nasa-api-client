<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImportRequest extends Eloquent
{
    /**
     * Import request status constants
     */
    const STATUS_WAITING = 1;
    const STATUS_IMPORTED = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_to_id', 'day', 'earth_date', 'status'
    ];

}
