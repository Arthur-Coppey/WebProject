<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class IdeaLike extends Pivot
{
    protected $table = 'ideas_likes';

    protected $fillable = ['idea_id', 'user_id', 'like'];
}
