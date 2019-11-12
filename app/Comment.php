<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'hidden', 'user_id', 'idea_id', 'event_id',];
}
