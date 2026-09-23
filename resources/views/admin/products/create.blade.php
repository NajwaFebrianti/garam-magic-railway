@extends('layouts.admin')
@section('title', 'Tambah Produk')

@section('content')
<div class="max-w-2xl bg-mystic-900/60 border border-gold-500/20 rounded-xl p-6">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @include('admin.products._form')
        <button class="bg-gold-500 hover:bg-gold-400 text-mystic-950 font-semibold px-6 py-2.5 rounded-lg">Simpan Produk</button>
    </form>
</div>
@endsection
