<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
  public function index()
  {
    $user = User::all();
    return view('admin.Users.index', compact('user'));
  }
  public function update(Request $request, $usertype)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|unique:users,email,' . $usertype,
      'username' => 'required|unique:users,username,' . $usertype,
      'phone' => 'sometimes|unique:users,phone,' . $usertype,
      'password' => 'sometimes|confirmed',
    ]);
    $User = User::find($usertype);
    $User->name = request('name');
    $User->email = request('email');
    $User->username = request('username');
    $User->phone = request('phone');
    if (empty(request('password'))) {
      $User->password = $User->password;
    } else {
      $User->password = bcrypt(request('password'));
    }
    $User->usertype = request('usertype');
    $User->save();
    return redirect()->route('admin.users')->with('success', 'update user successfully');
  }
}
