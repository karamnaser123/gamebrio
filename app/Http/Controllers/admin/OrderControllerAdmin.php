<?php

namespace App\Http\Controllers\admin;

use App\Models\orders;
use App\Models\order_status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderControllerAdmin extends Controller
{
  public function index(Request $request)
  {
    $user = auth()->user();
    $perPage = $request->input('entries', 5);
    $selectedStatus = $request->input('status');
    $nameFilter = $request->input('name');

    $ordersQuery = orders::with('products')
      ->orderByDesc('created_at');

    $totalOrdersPrice = $ordersQuery->get()->sum('total_amount');


    if (!empty($selectedStatus)) {
      $ordersQuery->where('status', $selectedStatus);
    }

    if (!empty($nameFilter)) {
      $ordersQuery->where('order_id', 'like', '%' . $nameFilter . '%');
    }

    $order_status = order_status::all();

    $orders = $ordersQuery->paginate($perPage);


    return view('admin.Orders.index', compact('orders',  'totalOrdersPrice', 'order_status'));
  }

  public function update(Request $request, $id)
  {

    $request->validate([
      'status' => 'required',
    ]);

    $product = orders::find($id);
    $product->status = request('status');
    $product->save();
    return redirect()->back()->with('success', 'Order Updated Successfully.');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'required|string',
      'price' => 'required|numeric',
      'type' => 'required|string|max:255',
      'filter' => 'string|max:255',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = new orders();
    $product->name = request('name');
    $product->description = request('description');
    $product->price = request('price');
    if (request('discount')) {
      $product->discount = request('discount');
    } else {
      $product->discount = 0;
    }
    $product->price_after_discount = request('price') - request('discount');
    $product->type = request('type');
    $product->filter = request('filter');
    if (request()->hasFile('image')) {
      $file = request()->file('image');
      $extension = $file->getClientOriginalExtension(); // getting image extension
      $filename = time() . '.' . $extension;
      $file->move('products/images/', $filename);
      $product->image = $filename;
    }
    if (($product->price - $product->discount) < 0.01) {
      return redirect()->back()->with('error', 'price less 1');
    }
    $product->save();
    return redirect()->back()->with('success', 'Product Added successfully.');
  }
}
