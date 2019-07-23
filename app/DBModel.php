<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DBModel extends Model
{
	public $table = 'product_variants';

    protected $fillable = [
    	'product_id','product_slug'
    ];
}
