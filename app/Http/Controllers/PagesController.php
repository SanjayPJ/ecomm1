<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PagesController extends Controller
{
    public function index(){
    	return view('index')->with('products', Product::paginate(3));
    }

    public function single($id){
    	return view('single')->with('product', Product::findOrFail($id));
    }

    public function not_get(){
    	abort(404);
    }
}
