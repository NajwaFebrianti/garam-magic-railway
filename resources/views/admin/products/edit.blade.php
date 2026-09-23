@extends('layouts.admin')
@section('title', 'Edit Produk')

@section('content')
<div class="max-w-2xl bg-mystic-900/60 border border-gold-500/20 rounded-xl p-6">
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        @include('admin.products._form', ['product' => $product])
        <button class="bg-gold-500 hover:bg-gold-400 text-mystic-950 font-semibold px-6 py-2.5 rounded-lg">Perbarui Produk</button>
    </form>
</div>
@endsection
