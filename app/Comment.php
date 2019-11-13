<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'hidden', 'user_id', 'idea_id', 'event_id',];

    public function idea() {
        return $this->belongsTo('App\Idea');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function event() {
        return $this->belongsTo('App\Event');
    }
}
