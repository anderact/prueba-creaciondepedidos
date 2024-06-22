<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::where('is_active', true)
                       ->orderByDesc('created_at')
                       ->paginate(15);

    return view('product.index', compact('products'));
    }

    public function create(): View
    {
        $product = new Product();

        return view('product.create', compact('product'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $dimensions = [
            'length' => $request->input('dimensions.length'),
            'width' => $request->input('dimensions.width'),
            'height' => $request->input('dimensions.height'),
        ];

        // Verifica que las dimensiones no están vacías
        if (empty($dimensions['length']) && empty($dimensions['width']) && empty($dimensions['height'])) {
            $dimensions = null;
        }

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->sku = $validatedData['sku'] ?? null;
        $product->price = $validatedData['price'];
        $product->is_active = $validatedData['is_active'];
        $product->weight = $validatedData['weight'] ?? null;
        $product->dimensions = $dimensions;
        $product->image = $validatedData['image'] ?? null;
        $product->save();

        return Redirect::route('products.index')
            ->with('success', 'Product created successfully.');
    }


    public function show($id): View
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    public function edit($id): View
    {
        $product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $validatedData = $request->validated();
        dd($validatedData);

        $dimensions = [
            'length' => $request->input('dimensions.length'),
            'width' => $request->input('dimensions.width'),
            'height' => $request->input('dimensions.height'),
        ];

        // Verifica que las dimensiones no están vacías
        if (empty($dimensions['length']) && empty($dimensions['width']) && empty($dimensions['height'])) {
            $dimensions = null;
        }

        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->sku = $validatedData['sku'] ?? null;
        $product->price = $validatedData['price'];
        $product->is_active = $validatedData['is_active'];
        $product->weight = $validatedData['weight'] ?? null;
        $product->dimensions = $dimensions;
        $product->image = $validatedData['image'] ?? null;
        $product->save();

        return Redirect::route('products.index')
            ->with('success', 'Product updated successfully');
    }


    public function destroy($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->is_active = false;
        $product->save();

        return Redirect::route('products.index')
            ->with('success', 'Product deactivated successfully');
    }
}
