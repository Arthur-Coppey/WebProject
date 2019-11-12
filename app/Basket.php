<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Basket extends Pivot
{
    protected $table = 'basket';

    protected $fillable = ['amount', 'user_id', 'product_id'];
}
