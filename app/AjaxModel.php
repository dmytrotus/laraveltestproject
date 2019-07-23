<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AjaxModel extends Model
{
    public $table = 'ajax_db';

    protected $fillable = [
    	'title', 'text'
    ];
}
