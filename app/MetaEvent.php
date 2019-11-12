<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaEvent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label', 'descrition', 'location', 'start_date', 'occurences', 'frequency', 'price', 'hidden',
    ];
}
