<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'center_id', 'email', 'password', 'role_id', 'center_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function center() {
        return $this->belongsTo('App\Center');
    }

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function orders() {
        return $this->hasMany('App\Orders');
    }

    public function participates() {
        return $this->belongsToMany('App\Event', 'participants')
            ->using('App\Participants');
    }

    public function basket() {
        return $this->belongsToMany('App\Product', 'basket')
            ->as('basket')
            ->using('App\Basket')
            ->withPivot(['amount']);
    }

    public function ideasLikes() {
        return $this->belongsToMany('App\Idea', 'ideas_likes')
            ->as('ideasLikes')
            ->using('App\IdeaLike')
            ->withPivot(['ideaLike']);
    }

    public function commentsLikes() {
        return $this->belongsToMany('App\Comment', 'comments_likes')
            ->as('commentsLikes')
            ->using('App\CommentLike')
            ->withPivot(['commentLike']);
    }

    public function picturesLikes() {
        return $this->belongsToMany('App\Picture', 'pictures_likes')
            ->as('picturesLikes')
            ->using('App\PictureLike')
            ->withPivot(['pictureLike']);
    }

    public function pictures() {
        return $this->hasMany('App\Picture');
    }

    public function subscribes() {
        return $this->belongsToMany('App\MetaEvent', 'subscribers')
            ->using('App\Subscriber');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function ideas() {
        return $this->hasMany('App\Idea');
    }

    public function notifs() {
        return $this->hasMany('App\Notification');
    }



}
