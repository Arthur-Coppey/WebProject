<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function notification() {
        return $this->hasOne('App\Notification');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function votes() {
        return $this->belongsToMany('App\User', 'ideas_likes')
            ->as('vote')
            ->using('App\IdeaLike')
            ->withPivot(['like']);
    }
}
