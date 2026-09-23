@extends('layouts.admin')
@section('title', 'Produk')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.products.create') }}" class="bg-gold-500 hover:bg-gold-400 text-mystic-950 font-semibold text-sm px-5 py-2.5 rounded-lg">+ Tambah Produk</a>
</div>

<div class="bg-mystic-900/60 border border-gold-500/20 rounded-xl p-6 overflow-x-auto">
    <table class="w-full text-sm">
        <thead>
            <tr class="text-left text-mystic-400 border-b border-mystic-700">
                <th class="pb-2">Nama</th>
                <th class="pb-2">Harga</th>
                <th class="pb-2">Stok</th>
                <th class="pb-2">Status</th>
                <th class="pb-2"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr class="border-b border-mystic-800/60">
                    <td class="py-3 text-mystic-100">{{ $product->name }}</td>
                    <td class="py-3 text-mystic-300">{{ $product->formatted_price }}</td>
                    <td class="py-3 text-mystic-300">{{ $product->stock }}</td>
                    <td class="py-3">
                        <span class="text-xs px-2 py-1 rounded-full {{ $product->is_active ? 'bg-green-900/60 text-green-400' : 'bg-red-900/60 text-red-400' }}">
                            {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td class="py-3 flex gap-3">
                        <a href="{{ route('admin.products.edit', $product) }}" class="text-gold-400 hover:underline">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-400 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="py-6 text-center text-mystic-400">Belum ada produk.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $products->links() }}</div>
@endsection
