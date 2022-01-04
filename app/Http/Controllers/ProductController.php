<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $rules = [
            "title" => ["required", "max:255"],
            "description" => ["required", "max:1000"],
            "price" => ["required", "min:1"],
            "stock" => ["required", "min:0"],
            "status" => ["required", "in:available,unavailable"],
        ];

        request()->validate($rules);

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
        if (request()->status === "available" && request()->stock == 0) {
            // session()->flash("error", "If available must have stock");
            return redirect()->back()->withInput(request()->all())->withErrors("If available must have stock");
        }

        session()->forget("error");

        $product = Product::create(request()->all());
        // session()->flash("success", "The new product with id {$product->id} was created");
        return redirect()->route("products.index")->with("success", "The new product with id {$product->id} was created");
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
        $rules = [
            "title" => ["required", "max:255"],
            "description" => ["required", "max:1000"],
            "price" => ["required", "min:1"],
            "stock" => ["required", "min:0"],
            "status" => ["required", "in:available,unavailable"],
        ];

        request()->validate($rules);
        $product = Product::findOrFail($product);
        $product->update(request()->all());
        session()->flash("success", "The new product with id {$product->id} was edited");
        return redirect()->route("products.index");
    }
    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();
        return redirect()->route("products.index")->with("success", "The new product with id {$product->id} was deleted");
    }
}
