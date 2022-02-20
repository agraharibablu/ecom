@extends('frontend.layouts.app')

@section('title')
Products Detail Page
@endsection

@section('content')
<div class="breadcrumb">
    <img src="{{asset('frontend/image/breadcrumb/bg-1.jpg')}}" class="img-fluid" alt="">
</div>


<div class="container">

    <ul class="shuffle-filter">
        <li class='selected' data-target='all'>View All</li>
        @foreach($categories as $category)
        <li data-target='{{ucfirst($category->category_name)}}'>{{ucfirst($category->category_name)}}</li>
        @endforeach
    </ul>

    <div class="row shuffle-container">
        @foreach($products as $product)
        <div class="col-md-4 filter-box" data-groups='["all","{{$product->CategoryName->category_name}}"]'>
            <div class="shop-box bg-1">
                <div class="shop-img">
                    <img src="{{ asset('attachment/product/'.$product->thumbnail) }}" class="img-fluid" alt="">
                </div>
                <div class="cta-container">
                    <a href="#">Add To Cart</a>
                </div>
                <div class="shop-product-title">
                    <P class="product-name">{{ucwords($product->product_name)}}</P>
                    <P>{{ucwords($product->description)}}</P>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- mgs section start    -->
<div class="mgs-section">
    <div class="contianer-fluid2">
        <div class="mgs-container">
            <h2>Ancient Nutrition for the Modern World</h2>
            <p>The healthcare industry is filled with brands piling up unnecessary ingredients in their
                supplements (many synthetic & fillers too!) or pump up potency to show themselves
                better than competition. We focus on purity & potency most importantly and thus
                “ Actives” being a key part of our brand name..............
            </p>

            <a href="#" class="learn-btn">Learn More</a>
        </div>
    </div>
</div>
<!-- mgs section end -->
@endsection