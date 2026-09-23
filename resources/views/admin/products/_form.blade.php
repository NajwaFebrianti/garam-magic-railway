<div>
    <label class="block text-sm text-mystic-300 mb-1">Nama Produk</label>
    <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" required class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100">
    @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block text-sm text-mystic-300 mb-1">Tagline</label>
    <input type="text" name="tagline" value="{{ old('tagline', $product->tagline ?? '') }}" class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100">
</div>

<div>
    <label class="block text-sm text-mystic-300 mb-1">Deskripsi</label>
    <textarea name="description" rows="4" required class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100">{{ old('description', $product->description ?? '') }}</textarea>
    @error('description') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block text-sm text-mystic-300 mb-1">Manfaat (satu baris per poin)</label>
    <textarea name="benefits" rows="4" class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100">{{ old('benefits', $product->benefits ?? '') }}</textarea>
</div>

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-sm text-mystic-300 mb-1">Harga (Rp)</label>
        <input type="number" name="price" value="{{ old('price', $product->price ?? 40000) }}" required class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100">
        @error('price') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm text-mystic-300 mb-1">Stok</label>
        <input type="number" name="stock" value="{{ old('stock', $product->stock ?? 100) }}" required class="w-full bg-mystic-950 border border-mystic-700 rounded-lg px-4 py-2 text-mystic-100">
        @error('stock') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div>
    <label class="block text-sm text-mystic-300 mb-1">Gambar Produk (opsional)</label>
    <input type="file" name="image" class="w-full text-mystic-300 text-sm">
</div>

<label class="flex items-center gap-2">
    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }} class="accent-gold-500">
    <span class="text-mystic-300 text-sm">Produk Aktif (ditampilkan di toko)</span>
</label>
