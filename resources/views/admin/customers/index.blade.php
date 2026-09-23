@extends('layouts.admin')
@section('title', 'Pelanggan')

@section('content')
<form class="mb-6">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / no. WhatsApp..." class="bg-mystic-900 border border-mystic-700 rounded-lg px-4 py-2 text-sm text-mystic-100 focus:outline-none focus:border-gold-400 w-full max-w-sm">
</form>

<div class="bg-mystic-900/60 border border-gold-500/20 rounded-xl p-6 overflow-x-auto">
    <table class="w-full text-sm">
        <thead>
            <tr class="text-left text-mystic-400 border-b border-mystic-700">
                <th class="pb-2">Nama</th>
                <th class="pb-2">WhatsApp</th>
                <th class="pb-2">Kota</th>
                <th class="pb-2">Jumlah Pesanan</th>
                <th class="pb-2"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
                <tr class="border-b border-mystic-800/60">
                    <td class="py-3 text-mystic-100">{{ $customer->name }}</td>
                    <td class="py-3 text-mystic-300">{{ $customer->whatsapp }}</td>
                    <td class="py-3 text-mystic-300">{{ $customer->city }}</td>
                    <td class="py-3 text-mystic-300">{{ $customer->orders_count }}</td>
                    <td class="py-3"><a href="{{ route('admin.customers.show', $customer) }}" class="text-gold-400 hover:underline">Detail</a></td>
                </tr>
            @empty
                <tr><td colspan="5" class="py-6 text-center text-mystic-400">Belum ada pelanggan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $customers->links() }}</div>
@endsection
