<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function index()
    {
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
