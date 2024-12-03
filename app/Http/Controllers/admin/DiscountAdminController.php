<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\discountcode;

class DiscountAdminController extends Controller
{
  public function index()
  {
    $discountcode = discountcode::all();
    return view('admin.Discountcode.index', compact('discountcode'));
  }
  public function update($id, Request $request)
  {
    $request->validate([
      'code' => 'required|string|max:255',
      'price' => 'required|numeric|max:255',
    ]);
    $code = discountcode::find($id);
    $code->code = request('code');
    $code->price = request('price');
    $code->save();

    return redirect()->route('admin.discount')->with('success', 'DiscountCode  Updated Successfully.');
  }
  public function store(Request $request)
  {
    $request->validate([
      'code' => 'required|string|max:255',
      'price' => 'required|numeric|max:255',
    ]);
    $discount = new  discountcode();
    $discount->code = request('code');
    $discount->price = request('price');
    $discount->save();

    return redirect()->route('admin.discount')->with('success', 'DiscountCode  Created Successfully.');
  }
  public function destroy()
  {
    discountcode::findOrFail(request()->id)->delete();
    return redirect()->route('admin.discount')->with('success', 'DiscountCode deleted');
  }
}
