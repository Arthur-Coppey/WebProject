<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductCategory extends Pivot
{
    protected $table = 'product_categories';

    protected  $fillable = ['product_id', 'category_id'];
}
