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
            ->create($request->validatedWithImage());
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
            $product->update($request->validatedWithImage());
        return redirect()->route('products.show', $product);
    }


    public function destroy(Product $product)
    {
        $product->deleteImage();
        $product->delete();
        return redirect(route('products.index'));
    }

    function removeImage(Product $product) {
        $this->authorize('update',$product);
        $product->deleteImage();
        $product->update([
            'image_path' => null
        ]);

        return back();
    }
}
