<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $total_user = User::count();
        $total_product = Product::count();
        $total_order = Order::count();
        $total_transaction = Transaction::count();
        return Inertia::render('Dashboard', compact("total_user", "total_product", "total_order", "total_transaction"));
    }
}
