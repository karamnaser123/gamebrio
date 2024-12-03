<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function index(Request $request)
  {
    $user = auth()->user();
    $perPage = $request->input('entries', 5);
    $selectedStatus = $request->input('status');
    $nameFilter = $request->input('name');

    $ordersQuery = orders::with('products', 'reviews')
      ->where('user_id', $user->id)
      ->orderByDesc('created_at');


    $totalOrdersPrice = $ordersQuery->get()->sum('total_amount');


    if (!empty($selectedStatus)) {
      $ordersQuery->where('status', $selectedStatus);
    }

    if (!empty($nameFilter)) {
      $ordersQuery->where('order_id', 'like', '%' . $nameFilter . '%');
    }

    $orders = $ordersQuery->paginate($perPage);
    $userName = $user->name;

    return view('user.orders.index', compact('orders', 'userName', 'totalOrdersPrice'));
  }
}
