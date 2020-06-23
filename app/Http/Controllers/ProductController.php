<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Product::create([
        //     'product_name' => $request->product_name,
        //     'price' => $request->price,
        //     'stock' => $request->stock
        // ]);

        Product::create($request->all());
        return redirect('/products');
        // return back();
    }

    public function viewProduct()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function edit($id)
    {
        // $product = Product::where('id', $id)->first();
        $product = Product::findOrFail($id);
        return view('edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Product::where('id', $id)->update([
        //     'product_name' => $request->product_name,
        //     'price' => $request->price,
        //     'stock' => $request->stock
        // ]);

        Product::findOrFail($id)->update($request->all());

        return redirect('/products');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back();
    }
}
