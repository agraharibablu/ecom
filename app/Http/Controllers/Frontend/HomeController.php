<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.index');
    }
}