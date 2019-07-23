<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
    	'title', 'cat_id', 'options'
    ];
     protected $casts = [
        'options' => 'array'
    ];


    /*для того щоб не було пустих значень в json*/
	public function setOptionsAttribute($value)
		{
	$options = [];
	foreach ($value as $array_item) {
	if (!is_null($array_item['key'])) {
	    $options[] = $array_item;
		}
		}
	$this->attributes['options'] = json_encode($options);
		}
	/*для того щоб не було пустих значень в json*/
    
}
