<?php

namespace App\Http\Controllers\admin;

use App\Models\games;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GamesController extends Controller
{
    public function index()
    {
        $games = games::all();
        return view('admin.games.index', compact('games'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'namegames' => 'required|string|max:255',
            'account' => 'required|string|max:255',
        ]);
        $filters = games::find($id);
        $filters->namegames = request('namegames');
        $filters->account = request('account');
        $filters->save();

        return redirect()->route('admin.games')->with('success', 'Games  Updated Successfully.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'namegames' => 'required|string|max:255',
            'account' => 'required|string|max:255',
        ]);
        $filters = new  games();
        $filters->namegames = request('namegames');
        $filters->account = request('account');
        $filters->save();

        return redirect()->route('admin.games')->with('success', 'Games  Created Successfully.');
    }
}
