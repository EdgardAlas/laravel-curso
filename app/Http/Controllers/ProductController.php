<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // $product = DB::table(("products"))->get();
        $product = Product::all();
        dd($product);
        return view("products.index");
    }

    public function create()
    {
        return "This is the form to create products";
    }
    public function store()
    {
    }
    public function show($product)
    {
        // $products = DB::table(("products"))->find($product);
        $products = Product::findOrFail($product);
        dd($products);
        return view("products.show");
    }

    public function edit($product)
    {
        return "Show the product with id {$product} to edit";
    }
    public function update($product)
    {
    }
    public function destroy($product)
    {
        return "Show the product with id {$product} to delete";
    }
}
