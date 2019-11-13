<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Participant extends Pivot
{
    protected $table = 'participants';

    protected $fillable = ['user_id', 'event_id'];
}
