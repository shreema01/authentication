<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // About Us Page
    public function about()
    {
        return view('pages.about');
    }

    // Contact Us Page
    public function contact()
    {
        return view('pages.contact');
    }
}
