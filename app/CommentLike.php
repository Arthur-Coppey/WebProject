<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CommentLike extends Pivot
{
    protected $table = 'comments_likes';

    protected $fillable = ['comment_id', 'user_id', 'like'];
}
