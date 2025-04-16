<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function homePage() {
        return view('home');
    }

    public function singlePost() {
        return view('single-post');
    }
}
