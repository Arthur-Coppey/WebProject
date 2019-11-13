<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * overrides orm default table to fit
     */
    protected $table = 'categories';

    /**
     *
     *
     */
    protected $fillable = ['label'];

    public function products() {
        return $this->belongsToMany('App\Product', 'product_categories')
            ->using('App\ProductCategory');
    }
}
