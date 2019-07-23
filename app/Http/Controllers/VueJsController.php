<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueJsController extends Controller
{
    public function index()
    {
    	//return 12;
        return view ('vuejs.indextext');
    }

    public function main()
    {
    	return view ('vuejs.main');
    }

    public function routing()
    {
    	return view ('vuejs.routing');
    }

    public function routingWithTemplates()
    {
        return view ('vuejs.routingWithTemplates');
    }

    
}
