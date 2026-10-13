@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Tambah Produk</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-5">
            @foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}" class="bg-white p-6 rounded shadow space-y-4">
        @csrf
        <input name="name" value="{{ old('name') }}" placeholder="Nama produk" class="w-full border p-2 rounded">
        <select name="category_id" class="w-full border p-2 rounded">
            <option value="">-- Pilih kategori --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        <textarea name="description" placeholder="Deskripsi" class="w-full border p-2 rounded">{{ old('description') }}</textarea>
        <input type="number" name="price" value="{{ old('price') }}" placeholder="Harga" class="w-full border p-2 rounded">
        <input type="number" name="stock" value="{{ old('stock') }}" placeholder="Stok" class="w-full border p-2 rounded">
        <label><input type="checkbox" name="is_active" value="1" checked> Produk aktif</label>
        <div>
            <button class="bg-blue-600 text-white px-5 py-2 rounded">Simpan</button>
            <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-5 py-2 rounded">Kembali</a>
        </div>
    </form>
</div>
@endsection