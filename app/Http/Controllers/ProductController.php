<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $this->authorize('create', Product::class);
        $categories = Category::orderBy('name')->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Product::class);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Product $product)
    {
        $product->load('category');
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        $categories = Category::orderBy('name')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}