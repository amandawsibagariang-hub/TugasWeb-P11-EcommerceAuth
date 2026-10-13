@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
        <p><b>Kategori:</b> {{ $product->category->name }}</p>
        <p><b>Harga:</b> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <p><b>Stok:</b> {{ $product->stock }}</p>
        <p class="mt-4"><b>Deskripsi:</b><br>{{ $product->description }}</p>
        <a href="{{ route('products.index') }}" class="inline-block mt-5 bg-gray-600 text-white px-4 py-2 rounded">Kembali</a>
    </div>
</div>
@endsection