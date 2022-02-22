<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function __construct()
    {
      
    }

    public function index($slug_url)
    {
        $data['product'] = Product::find($slug_url);
        return view('frontend.product-details',$data);
    }

}
