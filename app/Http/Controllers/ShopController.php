<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;

class ShopController extends Controller
{
    public function addToCart(Request $request){
    	$pdt = Product::findOrFail($request->input('pdt_id'));
    	$cart_item = Cart::add([
    		'id' => $pdt->id, 
    		'name' => $pdt->name, 
    		'qty' => $request->input('qty'), 
    		'price' => $pdt->price
    	])->associate('App\Product');
    	return redirect()->route('cart');
	}
	
	public function rapid_add($id){
    	$pdt = Product::findOrFail($id);
    	$cart_item = Cart::add([
    		'id' => $pdt->id, 
    		'name' => $pdt->name, 
    		'qty' => 1, 
    		'price' => $pdt->price
    	])->associate('App\Product');
    	return redirect()->back();
    }

    public function index(){
    	return view('cart');
    }

    public function delete_item($id){
    	Cart::remove($id);
    	return redirect()->back();
	}
	
	public function inc($id, $qty){
		Cart::update($id, $qty + 1);
		return redirect()->back();
	}

	public function dec($id, $qty){
		Cart::update($id, $qty - 1);
		return redirect()->back();
	}
}
