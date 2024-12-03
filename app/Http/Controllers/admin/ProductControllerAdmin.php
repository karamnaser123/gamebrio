<?php

namespace App\Http\Controllers\admin;

use App\Models\filter;
use App\Models\products;
use App\Models\typegames;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductControllerAdmin extends Controller
{
  public function index()
  {
    $products = products::all();
    return view('admin.Products.index', compact('products'));
  }

  public function update(Request $request, $id)
  {

    $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'required|string',
      'namear' => 'required|string|max:255',
      'descriptionar' => 'required|string',
      'price' => 'required|numeric',
      'quantity' => 'required|numeric',
      'type' => 'required|string|max:255',
      'filter' => 'string|max:255',
      'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example: Validate image file (2MB limit)
      'discount' => 'nullable|min:1', // Example: Validate image file (2MB limit)
    ]);

    $product = products::find($id);
    $product->name = request('name');
    $product->description = request('description');
    $product->namear = request('namear');
    $product->descriptionar = request('descriptionar');
    $product->price = request('price');
    $product->quantity = request('quantity');
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
    // return redirect()->back()->with('success', 'Product Updated Successfully.');
    return response()->json(['success' => 'Product Update successufly'], 200);
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'required|string',
      'namear' => 'required|string|max:255',
      'descriptionar' => 'required|string',
      'price' => 'required|numeric',
      'quantity' => 'required|numeric',
      'type' => 'required|string|max:255',
      'filter' => 'string|max:255',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
      'discount' => 'nullable|min:1', // Example: Validate image file (2MB limit)
    ]);

    $product = new products();
    $product->name = request('name');
    $product->description = request('description');
    $product->namear = request('namear');
    $product->descriptionar = request('descriptionar');
    $product->price = request('price');
    $product->quantity = request('quantity');
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
    return response()->json(['success' => 'Product created successfully'], 200);
  }

  public function search(Request $request)
  {
    $search = $request->input('search');

    // Perform the search query using your breeds model
    $products = products::where('id', 'like', '%' . $search . '%')
      ->orWhere('name', 'like', '%' . $search . '%')
      ->orWhere('namear', 'like', '%' . $search . '%')
      ->orWhere('price', 'like', '%' . $search . '%')
      ->get();

    return view('admin.Products.index', ['products' => $products]);
  }
}
