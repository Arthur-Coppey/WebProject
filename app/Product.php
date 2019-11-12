<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label', 'description', 'price', 'center_id',
    ];

    public function center() {
        return $this->belongsTo('App\Center');
    }

    public function pictures() {
        return $this->hasMany('App\Picture');
    }

    public function orders() {
        return $this->belongsToMany('App\Order', 'orders_content')
            ->as('content')
            ->using('App\OrderContent')
            ->withPivot(['amount']);
    }

    public function basket() {
        return $this->belongsToMany('App\User', 'basket')
            ->as('basket')
            ->using('App\Basket')
            ->withPivot(['amount']);
    }

    public function categories() {
        return $this->belongsToMany('App\Category', 'product_categories')
            ->using('App\ProductCategory');
    }
}
