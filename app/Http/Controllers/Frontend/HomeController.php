<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Category;
use App\Models\Product;
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
        $data['categories'] = Category::limit(4)->get();
        $data['products'] = Product::limit(3)->get();
        return view('frontend.home',$data);
    }
}
