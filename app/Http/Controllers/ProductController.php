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
        return view("products.create");
    }
    public function store()
    {
        // $product = Product::create([
        //     'title' => request()->title,
        //     'description' => request()->description,
        //     'price' => request()->price,
        //     'stock' => request()->stock,
        //     'status' => request()->status,
        // ]);

        $product = Product::create(request()->all());
        // dd("Estamos en store");
        return $product;
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
        // return "Show the product with id {$product} to edit";
        return view("products.edit")->with((["product" => Product::findOrFail($product)]));
    }
    public function update($product)
    {
        $product = Product::findOrFail($product);
        $product->update(request()->all());
        return $product;
    }
    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();
        return $product;
    }
}
