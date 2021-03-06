<?php

namespace App\Http\Controllers;

use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::available()->get();
        // return response()->json($products);
        return view("welcome")->with([
            "products" => $products
        ]);
    }
}
