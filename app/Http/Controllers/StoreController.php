<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class StoreController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('frontend-page.store', compact('products'));
    }

    public function checkout(Request $request)
    {
        $items = json_decode($request->cart_list);
        return view('frontend-page.checkout', compact('items'));
    }

    public function checkoutStore(Request $request)
    {
        dd($request->all());
        return view('frontend-page.checkout');
    }
}
