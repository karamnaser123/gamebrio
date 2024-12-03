<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use App\Models\contact;
use App\Models\products;
use App\Models\review_orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  public function home()
  {
    $product = products::inRandomOrder()
      ->limit(6)
      ->get();
    $product2 = products::where('type', 1)
      ->limit(6)
      ->get();
    $bestoffer = products::where('discount', '=', DB::raw('price / 2'))
      ->inRandomOrder()
      ->limit(1)
      ->get();
    $ordersratings = review_orders::where('rating', '=', 5)
      ->limit(6)
      ->inRandomOrder()
      ->get();

    return view('user.home', compact('product', 'bestoffer', 'product2', 'ordersratings'));
  }
  public function contact()
  {
    if (auth()->check()) {
      $user = auth()->user();
      $cartcount = cart::where('user_id',   $user->id)
        ->count();
      return view('user.contact', compact('cartcount'));
    }

    return view('user.contact');
  }
  public function contactsend()
  {

    $lastMessageTimes = session('last_message_times', []);


    $lastMessageTimes = array_filter($lastMessageTimes, function ($timestamp) {
      return (time() - $timestamp) < 3600;
    });


    if (count($lastMessageTimes) >= 2) {
      return redirect()->route('contact')->with('error', 'You can only send two messages per hour.');
    }


    $message = new Contact;
    $message->firstname = request('firstname');
    $message->lastname = request('lastname');
    $message->email = request('email');
    $message->subject = request('subject');
    $message->message = request('message');
    $message->save();

    $lastMessageTimes[] = time();
    session(['last_message_times' => $lastMessageTimes]);

    return redirect()->route('contact')->with('success', 'Message Sent Successfully!');
  }
}
