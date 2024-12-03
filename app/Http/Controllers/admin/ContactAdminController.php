<?php

namespace App\Http\Controllers\admin;

use App\Models\contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactAdminController extends Controller
{
  public function index()
  {
    $contact = contact::all();
    return view('admin.contact.index', compact('contact'));
  }

  public function destroy()
  {
    contact::findOrFail(request()->id)->delete();
    return redirect()->route('admin.contact')->with('success', 'Contact deleted');
  }
}
