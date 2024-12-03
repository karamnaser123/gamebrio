<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\review;
use App\Models\products;
use Illuminate\Http\Request;
use App\Models\review_orders;

class ReviewController extends Controller
{
  public function reviewProduct(Request $request)
  {
    $request->validate([
      'review' => 'required|string|max:255',
    ]);

    $productId = $request->input('product_id');

    $user = auth()->user();

    // Check if the user has already reviewed the product
    $existingReview = review::where('product_id', $productId)
      ->where('user_id', $user->id)
      ->first();

    if ($existingReview) {
      return response()->json(['success' => false, 'message' => 'You have already reviewed this product.']);
    }

    $product = products::find($productId);

    if (!$product) {
      return response()->json(['success' => false, 'message' => 'Product not found']);
    }

    $review = new review;
    $review->product_id = $product->id;
    $review->user_id = $user->id;
    $review->review = $request->input('review');
    $review->save();

    return response()->json(['success' => true, 'message' => 'Your comment was added successfully']);
  }
  public function reviewOrders()
  {
    return view('user.orders.order-review');
  }
  public function reviewOrderscreate(Request $request)
  {
    $request->validate([
      'order_id' => 'required',
      'opinion' => 'required|string|min:6|max:255',
      'rating' => 'required',
    ]);

    $user = auth()->user();
    $order_id = request('order_id');

    $existingReview = review_orders::where('user_id', $user->id)
      ->where('order_id', $order_id)
      ->first();
    if ($existingReview) {
      return redirect()->route('my-orders')->with('error', 'You have already reviewed this order.');
    }
    $reviewOrder = new review_orders;
    $reviewOrder->order_id =     $order_id;
    $reviewOrder->user_id = auth()->user()->id;
    $reviewOrder->opinion = request('opinion');
    $reviewOrder->rating = request('rating');
    $reviewOrder->save();
    return redirect()->route('my-orders')->with('success', 'Your rating has been added successfully');
  }
//   public function reviewOrdersupdate(Request $request, $order_id)
// {
//     $request->validate([
//         'opinion' => 'required|string|min:6|max:255',
//         'rating' => 'required|numeric',
//     ]);

//     $user = auth()->user();

//     // Check if the user has the right to update the review for this order
//     $reviewOrder = review_orders::where('user_id', $user->id)
//         ->where('order_id', $order_id)
//         ->first();

//     if (!$reviewOrder) {
//         return redirect()->route('my-orders')->with('error', 'Review not found');
//     }

//     // Update the review details
//     $reviewOrder->opinion = $request->input('opinion');
//     $reviewOrder->rating = $request->input('rating');
//     $reviewOrder->save();

//     return redirect()->route('my-orders')->with('success', 'Your rating has been updated successfully');
// }


  public function Testimonials()
  {
    $ordersratings = review_orders::all();

    return view('user.dispalyratings', compact('ordersratings'));
  }
}