<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;

use App\Boats;

class CartController extends Controller
{
    public function add_to_cart()
    {
    	//dd(request()->all());

    	$pdt = Boats::find(request()->id);

    	$cartItem = Cart::add([
    		'id' => $pdt->id,
    		'name' => $pdt->title,
    		'qty' => request()->qty,
    		'price' => $pdt->price,
    		'weight' => 0
    	]);

    	Cart::associate($cartItem->rowId, 'App\Boats');

    	//php artisan vendor:publish для настройок


    	return back()->with('success', 'Товар додано в кошик');

    	//dd($cart);
    	//dd(Cart::content());

    }

    public function cart()
    {

    	//Cart::destroy(); очистити кошик
    	return view ('cart_full');
    }

    public function cart_delete($id)
    {
    	Cart::remove($id);

    	return back();
    }
}
