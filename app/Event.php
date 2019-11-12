<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label', 'description', 'location', 'date', 'price', 'recurring', 'hidden', 'meta_event_id'
    ];

    public function participants() {
        return $this->belongsTo('App\User');
    }
}
