<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Subscriber extends Pivot
{
    protected $table = 'subscribers';

    protected $fillable = ['meta_event_id', 'user_id'];
}
