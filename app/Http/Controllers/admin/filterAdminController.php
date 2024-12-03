<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\filter;

class filterAdminController extends Controller
{
  public function index()
  {
    $filters = filter::all();
    return view('admin.filters.index', compact('filters'));
  }
  public function update($id, Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'data_filter' => 'required|string|max:255',
      'namear' => 'required|string|max:255',
      'data_filter_ar' => 'required|string|max:255',
    ]);
    $filters = filter::find($id);
    $filters->name = request('name');
    $filters->data_filter = request('data_filter');
    $filters->namear = request('namear');
    $filters->data_filter_ar = request('data_filter_ar');
    $filters->save();

    return redirect()->route('admin.filter')->with('success', 'Filter  Updated Successfully.');
  }
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'data_filter' => 'required|string|max:255',
      'namear' => 'required|string|max:255',
      'data_filter_ar' => 'required|string|max:255',
    ]);
    $filters = new  filter();
    $filters->name = request('name');
    $filters->data_filter = request('data_filter');
    $filters->namear = request('namear');
    $filters->data_filter_ar = request('data_filter_ar');
    $filters->save();

    return redirect()->route('admin.filter')->with('success', 'Filter  Created Successfully.');
  }
}
