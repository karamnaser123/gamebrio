<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\filter;
use App\Models\review;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

  public function index()
  {
    $product = products::latest()
      ->where('quantity', '>', 0)
      ->get();
    $filter = filter::all();

    return view('user.product.index', compact('product', 'filter'));

    //->paginate(8)

  }
  public function getCartCount()
  {
    $user = Auth::user();
    $cartCount = cart::where('user_id', $user->id)->count();

    return response()->json(['count' => $cartCount]);
  }


  public function show(string $id, Request $request)
  {
    $product =  products::where('quantity', '>', 0)
      ->find($id);
    if (!$product) {
      abort(404, 'Data not found');
    }

    $randomType = $product->type;

    $related_products = products::where('type', $randomType)
      ->where('id', '!=', $product->id)
      ->where('quantity', '>', 0)
      ->inRandomOrder()
      ->limit(5)
      ->get();
    $reviews = review::where('product_id', $id)->get();
    $reviewscount = review::where('product_id', $id)
      ->count();
    if ($request->ajax()) {
      return response()->json([
        'reviews' => $reviews,
        'reviewscount' => $reviewscount,
      ]);
    }

    return view('user.product.show', [
      'product' => $product,
      'related_products' => $related_products,
      'reviews' => $reviews,
      'reviewscount' => $reviewscount
    ]);
  }
  public function search(Request $request)
  {
    $searchKeyword = $request->input('search');

    $gg = products::all();
    $results =  products::where('name', 'LIKE', '%' . $searchKeyword . '%')
      ->where('quantity', '>', 0)
      ->orWhere('namear', 'LIKE', '%' . $searchKeyword . '%')
      ->orWhere('price', 'LIKE', '%' . $searchKeyword . '%')
      ->orWhereHas('typegame', function ($query) use ($searchKeyword) {
        $query->where('name', 'LIKE', '%' . $searchKeyword . '%');
      })
      ->get();

    return view('user.product.search-results', compact('results', 'searchKeyword'));
  }
}
