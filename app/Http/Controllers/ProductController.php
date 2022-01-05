<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;

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
    public function store(ProductRequest $request)
    {
        // $rules = [
        //     "title" => ["required", "max:255"],
        //     "description" => ["required", "max:1000"],
        //     "price" => ["required", "min:1"],
        //     "stock" => ["required", "min:0"],
        //     "status" => ["required", "in:available,unavailable"],
        // ];

        // request()->validate($rules);

        // $product = Product::create([
        //     'title' => request()->title,
        //     'description' => request()->description,
        //     'price' => request()->price,
        //     'stock' => request()->stock,
        //     'status' => request()->status,
        // ]);
        // dd("Estamos en store");
        // return $product;
        // return redirect()->back();
        // return redirect()->back();


        session()->forget("error");

        $product = Product::create($request->validated());
        // session()->flash("success", "The new product with id {$product->id} was created");
        return redirect()->route("products.index")->with("success", "The new product with id {$product->id} was created");
    }
    public function show(Product $product)
    {
        // $products = DB::table(("products"))->find($product);
        // $product = Product::findOrFail($product);
        // dd($product);
        return view("products.show")->with([
            "producto" => $product,
            "html" => "<h2>Subtitle</h2>"
        ]);
    }

    public function edit(Product $product)
    {
        // return "Show the product with id {$product} to edit";
        return view("products.edit")->with((["product" => $product]));
    }
    public function update(ProductRequest $request, Product $product)
    {
        // $rules = [
        //     "title" => ["required", "max:255"],
        //     "description" => ["required", "max:1000"],
        //     "price" => ["required", "min:1"],
        //     "stock" => ["required", "min:0"],
        //     "status" => ["required", "in:available,unavailable"],

        // ];

        // request()->validate($rules);
        $product->update($request->validated());
        session()->flash("success", "The new product with id {$product->id} was edited");
        return redirect()->route("products.index");
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("products.index")->with("success", "The new product with id {$product->id} was deleted");
    }
}
