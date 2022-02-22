<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{

    public function __construct()
    {
      
    }

    public function index()
    {
        $data['categories'] = Category::All();
        $data['products']   = Product::All()->where('status', 1);
        return view('frontend.products',$data);
    }
   
}
