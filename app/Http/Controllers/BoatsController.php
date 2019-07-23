<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boats;

class BoatsController extends Controller
{
    public function index()
    {
    	$boats = Boats::all();

    	return view('boats')->with('boats', $boats);
    }
}
