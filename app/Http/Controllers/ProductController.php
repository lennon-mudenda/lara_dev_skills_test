<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	$total = $products->sum(function($prod){
    		return $prod->price_per_item * $prod->quantity_in_stock;
    	});
    	return view('index')->with('products',$products)->with('total',$total);
    }

    public function addProduct()
    {
    	$product = new Product;
    	$product->name = request()->input('name');
    	$product->quantity_in_stock = request()->input('quantity_in_stock');
    	$product->price_per_item = request()->input('price_per_item');
    	$product->save();

    	return response()->json(['product' => $product]);
    }
}
