@extends('layouts.admin')
@section('title', 'Pesanan')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <form class="flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari no. pesanan / nama..." class="bg-mystic-900 border border-mystic-700 rounded-lg px-4 py-2 text-sm text-mystic-100 focus:outline-none focus:border-gold-400">
        <select name="status" class="bg-mystic-900 border border-mystic-700 rounded-lg px-4 py-2 text-sm text-mystic-100">
            <option value="">Semua Status</option>
            @foreach (['pending'=>'Menunggu','diproses'=>'Diproses','dikirim'=>'Dikirim','selesai'=>'Selesai','dibatalkan'=>'Dibatalkan'] as $val => $label)
                <option value="{{ $val }}" @selected(request('status') === $val)>{{ $label }}</option>
            @endforeach
        </select>
        <button class="bg-mystic-700 hover:bg-mystic-600 text-white text-sm px-4 py-2 rounded-lg">Filter</button>
    </form>
</div>

<div class="bg-mystic-900/60 border border-gold-500/20 rounded-xl p-6 overflow-x-auto">
    <table class="w-full text-sm">
        <thead>
            <tr class="text-left text-mystic-400 border-b border-mystic-700">
                <th class="pb-2">No. Pesanan</th>
                <th class="pb-2">Pelanggan</th>
                <th class="pb-2">Metode</th>
                <th class="pb-2">Total</th>
                <th class="pb-2">Status</th>
                <th class="pb-2">Tanggal</th>
                <th class="pb-2"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr class="border-b border-mystic-800/60">
                    <td class="py-3 text-mystic-100">{{ $order->order_number }}</td>
                    <td class="py-3 text-mystic-300">{{ $order->customer->name ?? '-' }}</td>
                    <td class="py-3 text-mystic-300">{{ $order->payment_method_label }}</td>
                    <td class="py-3 text-mystic-300">{{ $order->formatted_total }}</td>
                    <td class="py-3"><span class="text-xs bg-mystic-700 text-gold-400 px-2 py-1 rounded-full">{{ $order->status_label }}</span></td>
                    <td class="py-3 text-mystic-400">{{ $order->created_at->format('d M Y') }}</td>
                    <td class="py-3"><a href="{{ route('admin.orders.show', $order) }}" class="text-gold-400 hover:underline">Detail</a></td>
                </tr>
            @empty
                <tr><td colspan="7" class="py-6 text-center text-mystic-400">Tidak ada pesanan ditemukan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $orders->links() }}</div>
@endsection
