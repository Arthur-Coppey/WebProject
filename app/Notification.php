<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'response_status', 'idea_id', 'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function idea() {
        return $this->belongsTo('App\Idea');
    }
}
