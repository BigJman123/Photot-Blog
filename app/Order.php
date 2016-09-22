<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'price',
    	'items',
    	'name',
    	'address',
    	'city',
    	'state',
    	'zip'
    ];

    protected $casts = [
    	'items' => 'array'
    ];

}
