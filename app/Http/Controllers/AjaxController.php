<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AjaxModel;

class AjaxController extends Controller
{
    public function index()
    {
		$articles = AjaxModel::all(['id','title']);

		return view('ajaxrequest.index',['articles' => $articles]);
    }


    public function updateCustomerRecord(Request $request)
    {
    	$data = $request->all(); // This will get all the request data.

        dd($data); // This will dump and die
    }

    public function store()
    {
		$res = AjaxModel::create(['title' => $request->title, 'text' => $request->text]);

		$data = ['id' => $res->id, 'title' => $request->title, 'text' => $request->text];

		return $data;
    }

    public function show()
    {
    	return view('ajaxrequest.index');
    }

    public function destroy()
    {
    	return view('ajaxrequest.index');
    }
}
