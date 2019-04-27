<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function getJsonProductById($id)
    {
        $product = $this->products->findOrFail($id);
        return $product;
    }
}
