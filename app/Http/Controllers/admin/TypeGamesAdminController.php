<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\typegames;

class TypeGamesAdminController extends Controller
{
  public function index()
  {
    $typegames = typegames::all();
    return view('admin.typegames.index', compact('typegames'));
  }
  public function update($id, Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'namear' => 'required|string|max:255',
    ]);
    $typegames = typegames::find($id);
    $typegames->name = request('name');
    $typegames->namear = request('namear');
    $typegames->save();

    return redirect()->route('admin.typegames')->with('success', 'TypeGames  Updated Successfully.');
  }
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'namear' => 'required|string|max:255',
    ]);
    $filters = new  typegames();
    $filters->name = request('name');
    $filters->namear = request('namear');
    $filters->save();

    return redirect()->route('admin.typegames')->with('success', 'TypeGames  Created Successfully.');
  }
}
