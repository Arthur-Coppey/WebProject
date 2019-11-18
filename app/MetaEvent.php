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
        'label', 'description', 'location', 'start_date', 'occurences', 'frequency', 'price', 'hidden', 'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function events() {
        return $this->hasMany('App\Event');
    }

    public function subscribers() {
        return $this->belongsToMany('App\User', 'subscribers')
            ->using('App\Subscriber');
    }
}
