<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'total_customers' => Customer::count(),
            'total_products' => Product::count(),
            'total_revenue' => Order::whereIn('status', ['diproses', 'dikirim', 'selesai'])->sum('total'),
            'unread_contacts' => Contact::where('is_read', false)->count(),
        ];

        $recentOrders = Order::with('customer')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }
}
