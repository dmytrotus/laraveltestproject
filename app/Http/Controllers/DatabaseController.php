<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\DBModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DatabaseController extends Controller
{
    public function index()
    {
    	$attributes = DBModel::all();

    	return view('database.index')
    	->with('attributes', $attributes);
    }

    public function makeDB()
    {
    	$product_id = '36';
    	$product_slug = 'weiche-sitzauflage-kolibri';
    	$tablename = 'product_variants';
    	$new_attribute_name = Str::snake('Boot Model');
    	
    	Schema::connection('mysql')->create($tablename, function($table)
    		use ($new_attribute_name)
    {
        $table->increments('id');
        $table->integer('product_id');
        $table->text('product_slug');
        $table->text('attributes_'.$new_attribute_name)->nullable();
        $table->timestamps();
    });

    	return back();
    }

    public function makeRowInDB(Request $request, DBModel $dbmodel)
    {
    	$product_id = '36';
    	$product_slug = 'weiche-sitzauflage-kolibri';
    	$tablename = 'product_variants';
    	$new_attribute_name = Str::snake('Boot Model');

    	$dbmodel = DBModel::create([
            'product_id' => $product_id,
            'product_slug' => $product_slug
                
        ]);

        return back();


    }

    public function showDBslug()
    {

    	$name = 'Boot Model';

    	$slug = Str::snake($name);

    	return  $slug;
    }

    public function attributeAdd(Request $request, DBModel $dbmodel)
    {
    	$new_attribute_name = Str::snake($request->attribute);

		Schema::table('product_variants', function($table)
			use ($new_attribute_name)
		{
			$table->text('title')->nullable();
            $table->text('text')->nullable();
		});

		return back();



    }

    public function attributeDelete(Request $request, DBModel $dbmodel)
    {

		Schema::table('product_variants', function($table)
		{
		$table->dropColumn('54545attributes_boot_model');
		});

		return back();



    }

    public function variantAdd()
    {
    	
    }


}