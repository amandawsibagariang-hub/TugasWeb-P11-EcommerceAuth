@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold">Daftar Produk</h1>
            <p class="text-gray-600">E-Commerce DB + Secure Auth</p>
        </div>
        @can('create', App\Models\Product::class)
            <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Produk</a>
        @endcan
    </div>

    @if(session('success'))
        <div class="mb-5 bg-green-100 text-green-800 p-4 rounded">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Produk</th>
                    <th class="p-3 text-left">Kategori</th>
                    <th class="p-3 text-left">Harga</th>
                    <th class="p-3 text-left">Stok</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr class="border-t">
                    <td class="p-3">{{ $products->firstItem() + $loop->index }}</td>
                    <td class="p-3 font-semibold">{{ $product->name }}</td>
                    <td class="p-3">{{ $product->category->name }}</td>
                    <td class="p-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="p-3">{{ $product->stock }}</td>
                    <td class="p-3">{{ $product->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td class="p-3">
                        <div class="flex gap-2">
                            <a href="{{ route('products.show', $product) }}" class="bg-gray-600 text-white px-3 py-1 rounded">Detail</a>
                            @can('update', $product)
                                <a href="{{ route('products.edit', $product) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                            @endcan
                            @can('delete', $product)
                                <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf @method('DELETE')
                                    <button class="bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="p-6 text-center">Belum ada produk.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-5">{{ $products->links() }}</div>
</div>
@endsection