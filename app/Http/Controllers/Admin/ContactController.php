<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function markRead(Contact $contact): RedirectResponse
    {
        $contact->update(['is_read' => true]);
        return back()->with('success', 'Pesan ditandai sudah dibaca.');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();
        return back()->with('success', 'Pesan dihapus.');
    }
}
