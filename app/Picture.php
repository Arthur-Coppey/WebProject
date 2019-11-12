<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'URI', 'hidden', 'event_id', 'product_id', 'user_id',
    ];
}
