<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }
}
