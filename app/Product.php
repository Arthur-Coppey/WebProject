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

    public function basket() {
        return $this->belongsToMany('App\User', 'basket')->as('basket')->using('App\Basket')->withPivot(['amount']);
    }
}
