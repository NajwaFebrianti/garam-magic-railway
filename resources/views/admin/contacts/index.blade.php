@extends('layouts.admin')
@section('title', 'Pesan Masuk')

@section('content')
<div class="bg-mystic-900/60 border border-gold-500/20 rounded-xl p-6 overflow-x-auto">
    <table class="w-full text-sm">
        <thead>
            <tr class="text-left text-mystic-400 border-b border-mystic-700">
                <th class="pb-2">Nama</th>
                <th class="pb-2">Email / WA</th>
                <th class="pb-2">Pesan</th>
                <th class="pb-2">Status</th>
                <th class="pb-2"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $contact)
                <tr class="border-b border-mystic-800/60 {{ $contact->is_read ? '' : 'bg-gold-500/5' }}">
                    <td class="py-3 text-mystic-100">{{ $contact->name }}</td>
                    <td class="py-3 text-mystic-300">{{ $contact->email }}<br><span class="text-xs text-mystic-500">{{ $contact->phone }}</span></td>
                    <td class="py-3 text-mystic-300 max-w-xs truncate">{{ $contact->message }}</td>
                    <td class="py-3">
                        <span class="text-xs px-2 py-1 rounded-full {{ $contact->is_read ? 'bg-mystic-700 text-mystic-300' : 'bg-gold-500/20 text-gold-400' }}">
                            {{ $contact->is_read ? 'Dibaca' : 'Baru' }}
                        </span>
                    </td>
                    <td class="py-3 flex gap-3">
                        @unless ($contact->is_read)
                            <form action="{{ route('admin.contacts.markRead', $contact) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="text-gold-400 hover:underline">Tandai Dibaca</button>
                            </form>
                        @endunless
                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-400 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="py-6 text-center text-mystic-400">Belum ada pesan masuk.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $contacts->links() }}</div>
@endsection
