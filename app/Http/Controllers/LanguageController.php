<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function setEnglish()
    {
        session(['locale' => 'en']);
        return redirect()->back();
    }

    public function setArabic()
    {
        session(['locale' => 'ar']);
        return redirect()->back();
    }
}
