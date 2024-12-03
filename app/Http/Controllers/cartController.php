<?php

namespace App\Http\Controllers;


use App\Models\cart;
use App\Models\User;
use App\Models\games;
use App\Models\orders;
use App\Models\products;
use Illuminate\Support\Str;
use App\Models\discountcode;
use Illuminate\Http\Request;
use App\Models\informetionOrder;
use App\Mail\PurchaseConfirmation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal;
use Illuminate\Support\Facades\Validator;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class cartController extends Controller
{

  public function index()
  {
    $user = auth()->user();

    $cartItems = cart::with('product')
      ->where('user_id',   $user->id)
      ->get();
    $cartcount = cart::where('user_id',   $user->id)
      ->count();
    $totalCartPrice = $cartItems->sum(function ($item) {
      return $item->total_price;
    });


    return view('user.cart.index', compact('cartItems', 'cartcount', 'totalCartPrice'));
  }

  public function increment(cart $cartItem)
  {

    if ($cartItem->user_id == auth()->user()->id) {
      $newQuantity = $cartItem->quantity + 1;
      $newTotalPrice = $cartItem->product->price_after_discount * $newQuantity;
      if ($newQuantity > $cartItem->product->quantity) {
        return redirect()->back()->with('error', 'Cannot add more than the available stock');
      }
      $cartItem->update([
        'quantity' => $newQuantity,
        'total_price' => $newTotalPrice
      ]);
    }
    return redirect()->back();
  }

  public function decrement(cart $cartItem)
  {
    if ($cartItem->user_id == auth()->user()->id) {
      $newQuantity = max($cartItem->quantity - 1, 1); // Ensure the quantity doesn't go below 1
      $newTotalPrice = $cartItem->product->price_after_discount * $newQuantity;

      $cartItem->update([
        'quantity' => $newQuantity,
        'total_price' => $newTotalPrice
      ]);
    }
    return redirect()->back();
  }

  public function clearCart(Request $request)
  {
    cart::where('user_id', Auth::user()->id)->delete();
    return redirect()->route('cart')->with('success', 'Cart cleared successfully');
  }
  public function addToCart(Request $request, products $product)
  {

    $product_id = $request->input('product_id');
    $user_id = Auth::user()->id;
    $quantity = $request->input('quantity');


    $product = products::find($product_id);

    if (!$product) {
      return redirect()->route('products.index')->with('error', 'Product not found');
    }

    $cart = cart::where('user_id', $user_id)
      ->where('products_id', $product_id)
      ->first();

    $newTotalQuantity = ($cart ? $cart->quantity : 0) + $quantity;
    if ($newTotalQuantity > $product->quantity) {
      return response()->json(['error' => 'Cannot add more than the available stock'], 404);
    }


    if (!$cart) {
      cart::create([
        'products_id' => $product_id,
        'user_id' => $user_id,
        'quantity' => $quantity,
        'total_price' =>  $product->price_after_discount * $quantity,
      ]);
    } else {
      $newTotalPrice = $product->price_after_discount * ($cart->quantity + $quantity);

      $cart->update([
        'quantity' => $cart->quantity + $quantity,
        'total_price' => $newTotalPrice,
      ]);
    }
    return response()->json(['success' => 'Product added to the cart'], 200);
  }
  public function applyDiscount(Request $request)
  {
    $request->validate([
      'code' => 'required',
    ]);

    $discountCode = $request->input('code');
    $discount = discountcode::where('code', $discountCode)->first();

    if ($discount) {
      session(['discountAmount' => $discount->price]);
      session(['discountCode' => $discountCode]);
      return redirect()->route('cart')->with('success', 'Discount applied successfully.');
    } else {
      return redirect()->route('cart')->with('error', 'Invalid discount code.');
    }
  }
  public function clearDiscount()
  {
    session()->forget('discountAmount');
    session()->forget('discountCode');
    return response()->json(['message' => 'Session data cleared.']);
  }


  public function checkout(Request $request)
  {

    $request->validate([
      'email' => 'required|email',
      'phone' => 'required|regex:/^[0-9]+$/',
    ]);



    $informetionOrder = new informetionOrder();
    $informetionOrder->email = request('email');
    $informetionOrder->phone = request('phone');
    $informetionOrder->note = request('note');
    session(['informetionOrder' => $informetionOrder]);


    $provider = new PayPal;
    $provider->setApiCredentials(config('paypal'));
    $token = $provider->getAccessToken();
    $provider->setAccessToken($token);

    // Calculate the total amount from cart items
    $totalAmount = 0;
    $cartItems = cart::where('user_id', auth()->user()->id)
      ->get();

    foreach ($cartItems as $cartItem) {
      $totalAmount += $cartItem->total_price;
    }

    if (session()->has('discountAmount')) {
      $discountAmount = session('discountAmount');
      $totalAmount -= $discountAmount;
    }
    if ($totalAmount > 0) {
      $response = $provider->createOrder([
        "intent" => "CAPTURE",
        "application_context" => [
          "return_url" => route("success"),
        ],
        "purchase_units" => [
          [
            "amount" => [
              "currency_code" => "USD",
              "value" => $totalAmount,
            ]
          ]
        ],
      ]);

      if (isset($response['id']) && $response['id'] !== null) {
        foreach ($response['links'] as $link) {
          if ($link['rel'] === 'approve') {
            return redirect()->away($link['href']);
          }
        }
      } else {
        return redirect()->route('cart')->with('error', 'error open paypal');
      }
    } else {
      session()->forget('discountAmount');
      session()->forget('discountCode');
      return redirect()->route('cart')->with('error', 'The total amount after discount is zero or less.');
    }
  }

  // public function saveOrderInformation()
  // {
  //   $informetionOrder = new informetionOrder();
  //   $informetionOrder->email = request('email');
  //   $informetionOrder->phone = request('phone');
  //   $informetionOrder->note = request('note');
  //   session(['informetionOrder' => $informetionOrder]);
  // }

  public function success(Request $request)
  {
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $provider->getAccessToken();
    $response = $provider->capturePaymentOrder($request->token);



    // if ($request->has('status')) {
    //   $status = $request->input('status');

    //   // Check if the transaction status is 'COMPLETED'
    //   if ($status == 'COMPLETED') {
    if ($response['status'] == 'COMPLETED') {
      $informetionOrder = session('informetionOrder');

      if ($informetionOrder) {
        $informetionOrder->save();
      }
      $user = auth()->user();
      $cartItems = cart::with('product')
        ->where('user_id',   $user->id)
        ->get();

      $totalCartPrice = $cartItems->sum(function ($item) {
        return $item->total_price;
      });

      $randomString = 'GB' . mt_rand(10000000000, 99999999999);

      while (orders::where('order_id', $randomString)->exists()) {
        $randomString = "GB" . mt_rand(10000000000, 99999999999);
      }

      $order = new orders();
      $order->user_id = $user->id;
      $order->order_id = $randomString;
      $order->total_amount = $totalCartPrice;
      $order->informetion_orders = $informetionOrder->id;

      $order->save();


      foreach ($cartItems as $cartItem) {
        $product = $cartItem->product;
        $order->products()->attach($product->id, [
          'name' => $product->name,
          'image' => $product->image,
          'quantity' => $cartItem->quantity,
          'price' => $product->price_after_discount, // Include this line
          'created_at' => now(),
        ]);
        $product->quantity -= $cartItem->quantity;
        $product->save();
      }

      cart::where('user_id', Auth::user()->id)->delete();

      $allAccounts = [];
      foreach ($cartItems as $cartItem) {
        $product = $cartItem->product;
        $quantity = $cartItem->quantity;

        // Retrieve games based on product ID
        $games = games::where('namegames', $product->id)->take($quantity)->get();

        // Extract accounts from games
        $accounts = $games->pluck('account')->toArray();

        // Add accounts to the array for the specific product ID
        $allAccounts[$product->id] = $accounts;

        // Delete games associated with the purchased products
        $games->each(function ($game) {
          $game->delete();
        });
        // $order->update(['status' => 3]);

      }


      Mail::to($informetionOrder->email)->send(new PurchaseConfirmation($order, $allAccounts));


      if (session()->has('discountAmount')) {
        session()->forget('discountAmount');
      }
      $discountCode = session('discountCode');
      $discountCode = discountcode::where('code', $discountCode)->first();

      if ($discountCode) {
        $discountCode->delete();
      }

      return redirect()->route('my-orders')->with('success', 'Thank you for your purchase. Your order will be sent to your email as soon as possible. If you encounter any problems, contact us');
    } elseif ($response['status'] == 'PENDING') {
      echo "<h1>Pending</h1>";
    } else {
      echo "<h1>Error</h1>";
    }
  }

  public function cancel()
  {
    // Handle payment cancellation

    return view('cancel');
  }



  public function destroy($productId)
  {
    $product = cart::where('products_id', $productId)->first();
    if ($product) {
      $product->delete();
    }

    return redirect()->route('cart');
  }
}
