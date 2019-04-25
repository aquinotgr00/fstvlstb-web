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
}
