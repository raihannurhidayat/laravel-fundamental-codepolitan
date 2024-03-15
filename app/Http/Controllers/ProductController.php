<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table("products")->get();
        return view("products.index", ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input("name");
        $price = $request->input("price");
        $description = $request->input("description");

        DB::table("products")->insert([
            "name" => $name,
            "price" => $price,
            "description" => $description,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);

        return redirect("products");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = DB::table('products')->select('id', 'name', 'price', 'description', 'created_at', 'updated_at')->where('id', $id)->first();
        return view("products.detail", ["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = DB::table('products')->select('id', 'name', 'price', 'description', 'created_at', 'updated_at')->where('id', $id)->first();

        return view("products.edit", ["product"=> $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->input("name");
        $price = $request->input("price");
        $description = $request->input("description");

        DB::table("products")->where("id", $id)->update([
            "name"=> $name,
            "price"=> $price,
            "description"=> $description,
            "updated_at" => date("Y-m-d H:i:s"),
        ]);

        return redirect("products");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("products")->where("id", $id)->delete();

        return redirect("products");
    }
}
