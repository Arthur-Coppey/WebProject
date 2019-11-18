<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PictureLike extends Pivot
{
    protected $table = 'pictures_likes';

    protected $fillable = ['picture_id', 'user_id', 'like'];
}
