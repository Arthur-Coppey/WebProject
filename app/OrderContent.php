<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderContent extends Pivot
{
    protected $table = 'orders_content';

    protected $fillable = ['product_id', 'order_id', 'amount'];
}
