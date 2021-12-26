<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // $product = DB::table(("products"))->get();
        $products = Product::all();
        // dd($products);
        return view("products.index")->with((['productos' => $products]));
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
        $product = Product::findOrFail($product);
        // dd($product);
        return view("products.show")->with([
            "producto" => $product,
            "html" => "<h2>Subtitle</h2>"
        ]);
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
