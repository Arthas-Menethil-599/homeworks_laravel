<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct() {
        $this->authorizeResource(Product::class, 'product', [
            'except' => ['index','show']
        ]);
    }

    public function index()
    {
        $products = Product::query()
            ->latest()
            ->paginate(5);

        return view('models.products.index', compact('products'));
    }


    public function create()
    {
        return view('models.products.form');
    }


    public function store(ProductRequest $request)
    {
        $product = auth()->user()
            ->products()
            ->create(['product_name' => $request->product_name, 'product_description' => $request->product_description, 'product_creator' => $request->product_creator]);
        return redirect(route('products.show', $product));
    }


    public function show(Product $product)
    {
        return view('models.products.show', compact('product'));
    }


    public function edit(Product $product)
    {
        return view('models.products.form', [
            'product' => $product
        ]);
    }


    public function update(ProductRequest $request, Product $product)
    {
        $product->update(['product_name' => $request->product_name, 'product_description' => $request->product_description, 'product_creator' => $request->product_creator]);
        return redirect()->route('products.show', $product);
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }
}
