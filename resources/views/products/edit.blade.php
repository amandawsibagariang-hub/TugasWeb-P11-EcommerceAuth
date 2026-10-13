@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Edit Produk</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-5">
            @foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('products.update', $product) }}" class="bg-white p-6 rounded shadow space-y-4">
        @csrf @method('PUT')
        <input name="name" value="{{ old('name', $product->name) }}" class="w-full border p-2 rounded">
        <select name="category_id" class="w-full border p-2 rounded">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        <textarea name="description" class="w-full border p-2 rounded">{{ old('description', $product->description) }}</textarea>
        <input type="number" name="price" value="{{ old('price', $product->price) }}" class="w-full border p-2 rounded">
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full border p-2 rounded">
        <label><input type="checkbox" name="is_active" value="1" @checked($product->is_active)> Produk aktif</label>
        <div>
            <button class="bg-yellow-500 text-white px-5 py-2 rounded">Update</button>
            <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-5 py-2 rounded">Kembali</a>
        </div>
    </form>
</div>
@endsection