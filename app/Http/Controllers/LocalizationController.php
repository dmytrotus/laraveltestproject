<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Klisl\Locale\LocaleMiddleware;



class LocalizationController extends Controller {


   public function index() {

      //set’s application’s locale
      //app()->setLocale($locale);
      
      //Gets the translated message and displays it
      //echo trans('lang.msg');
      return view('locale.index');
      
   }

   public function product(){

   	//app()->setLocale('en');
   	//route('setlocale', ['lang' => 'en']);

   	$currentLocale = app()->getLocale(); //перевіряю який стоїть локаль

   	if($currentLocale === 'ru'){

   		return view('locale.product_russia'); //даю інший View якщо російський локаль

   	}

   	if($currentLocale === 'en'){

   		return view('locale.product_eng'); //даю інший View якщо російський локаль

   	}


   	return view('locale.product');
   }

}