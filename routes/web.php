<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('cartexample', 'BoatsController@index');

Route::post('/cart/add',[
	'uses' => 'CartController@add_to_cart',
	'as' => 'cart.add'
]);

Route::get('/cart',[
	'uses' => 'CartController@cart',
	'as' => 'cart'
]);

Route::get('/cart/delete/{id}', [
	'uses' => 'CartController@cart_delete',
	'as' => 'cart.delete'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/testpage', function () {
//    return '<h1>testpage</h1>';
//});

Route::get('/hovereffects','AdminController@hoverEffects');

/*Роути до завдання з TODOS*/
Route::get('/admin','AdminController@login');

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/table', function () {
    return view('table');
});

Route::middleware(['auth'])->group(function () { //для захисту сторінок від незареєстрованих користувачів

Route::get('/todos','TodosController@index');

Route::get('/todos/{todo}', 'TodosController@show'); //показати запись

Route::get('/new-todos', 'TodosController@create'); //відкрити створення запису

Route::post('store-todos', 'TodosController@store'); //записати запис

Route::get('todos/{todo}/edit', 'TodosController@edit'); //відкрити редактор записи

Route::post('todos/{todo}/update-todos', 'TodosController@update'); //обновити запись(перезаписати)

Route::get('todos/{todo}/delete', 'TodosController@destroy'); //видалити запись

Route::get('/todos/{todo}/complete', 'TodosController@complete'); //complete

Route::get('/todos/{todo}/uncomplete', 'TodosController@uncomplete'); //uncomplete

Route::post('/import', 'TodosController@import'); //імпорт файлів

Route::post('/updateImport', 'TodosController@updateImport'); //оновлення файлів Excel

Route::get('/export', 'TodosController@export'); //експорт файлів

}); //закрив групу


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/vuejs', 'VueJsController@index'); ///не працює непонятно чого

Route::get('/vuejs/main', 'VueJsController@main');

Route::get('/vuejs/routing', 'VueJsController@routing');

Route::get('/vuejs/routingwithtemplates', 'VueJsController@routingWithTemplates');

Route::get('/database', 'DatabaseController@index');

Route::get('/database/create', 'DatabaseController@makeDB');

Route::get('/showDBslug', 'DatabaseController@showDBslug');

Route::get('/makeRowInDB', 'DatabaseController@makeRowInDB');

Route::get('/attribute/add', 'DatabaseController@attributeAdd');

Route::get('/attribute/delete', 'DatabaseController@attributeDelete');

Route::get('/variant/add', 'DatabaseController@variantAdd');

//Route::get('/ajaxrequest', 'AjaxController@index');

Route::post('/customer/ajaxupdate', 'AjaxController@updateCustomerRecord');

Route::resource('/ajaxrequest', 'AjaxController',['only' => ['index', 'store', 'show', 'destroy']]);

Route::resource('/article', 'ArticleController',['only' => ['index', 'store', 'show', 'destroy']]);

/*Localization*/

Route::get('/locale',[
	'uses' => 'LocalizationController@index',
	'as' => 'locale'
]);

Route::get('/locale/sometext', function(){
	return view('locale.sometext');
});

Route::get('product',[
	'uses' => 'LocalizationController@product',
	'as' => 'product'
]);

/*Localization*/

/*products_and_cats*/

Route::get('products_and_cats', 'ProductController@index');

Route::get('addpdt', 'ProductController@create');

Route::post('store',[
	'uses' => 'ProductController@store',
	'as' => 'admin.products.store'
]);

Route::get('pdt/{id}', 'ProductController@edit');

Route::post('update/{id}',[
	'uses' => 'ProductController@update',
	'as' => 'admin.products.update'
]);

/*products_and_cats*/