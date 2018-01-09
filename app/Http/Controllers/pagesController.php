<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function home () {
        return view('home');
    }

    public function intructies () {
        return view('intructions');
    }
}
