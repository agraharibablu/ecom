@extends('frontend.layouts.app')

@section('title')
Welcome Rooted Active Naturals
@endsection

@section('content')
<!-- offer-container start -->
<div class="offer-container">
    <p>Free Shipping | COD Available</p>
</div>
<!-- offer-container end -->
<!-- start content -->

<!-- banner start -->
<div class="banner-section">
    <img src="{{asset('frontend/image/home-slider/banner.jpg')}}" class="img-fluid" alt="">
</div>
<!-- banner end -->

<!-- feature section start -->
<div class="feature-section">
    <div class="container-fluid2">
        <div class="section-title bold">
            <h2>The Rooted difference</h2>
        </div>

        <div class="row">
            <div id="feature-carousel" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <img src="{{asset('frontend/image/icon/icon-12.png')}}" alt="">
                        </div>

                        <div class="feature-title">
                            <h3>3rd Party tested</h3>
                        </div>
                    </div>

                </div>
                <div class="item">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <img src="{{asset('frontend/image/icon/icon-13.png')}}" alt="">
                        </div>

                        <div class="feature-title">
                            <h3>3rd Party tested</h3>
                        </div>
                    </div>

                </div>
                <div class="item">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <img src="{{asset('frontend/image/icon/icon-14.png')}}" alt="">
                        </div>

                        <div class="feature-title">
                            <h3>3rd Party tested</h3>
                        </div>
                    </div>

                </div>
                <div class="item">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <img src="{{asset('frontend/image/icon/icon-15.png')}}" alt="">
                        </div>

                        <div class="feature-title">
                            <h3>3rd Party tested</h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- feature section end -->

<!-- pointer section start -->
<div class="pointer-section">
    <div class="container-fluid2">
        <div class="row">
            <div class="col-md-3">
                <div class="pointer-box">
                    <div class="pointer-des">
                        <p>*Best Vitamins <br />
                            for Clear<br />
                            Glowing Skin*</p>
                    </div>
                    <div class="pointer-title">
                        <h2>Town & Country</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="pointer-box">
                    <div class="pointer-des">
                        <p>Named the number one <br />
                            product that'll make your <br />
                            period less painful</p>
                    </div>
                    <div class="pointer-title">
                        <h2>Town & Country</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="pointer-box">
                    <div class="pointer-des">
                        <p>*Best Vitamins <br />
                            for Clear<br />
                            Glowing Skin*</p>
                    </div>
                    <div class="pointer-title">
                        <h2>Town & Country</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="pointer-box">
                    <div class="pointer-des">
                        <p>*Best Vitamins <br />
                            for Clear<br />
                            Glowing Skin*</p>
                    </div>
                    <div class="pointer-title">
                        <h2>Town & Country</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pointer section end -->

<!-- shop by category section start -->
<div class="category-section">
    <div class="container-fluid2">
        <div class="section-title">
            <h2>Shop by Category</h2>
        </div>
        <div class="row mt-5">
            @foreach($categories as $category)
            <div class="col-md-3">
                <div class="img-box">
                    <img src="{{asset('attachment/category/'.$category->thumbnail)}}" class="img-fluid" alt="">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- shop by category section end -->

<!-- feature product section start -->
<div class="feature-product-section">
    <div class="container-fluid2">
        <div class="section-title">
            <h2>Featured Products</h2>
        </div>
        <div class="row mt-5 g-0">
            <div class="col-md-6">
                <div class="feature-img-box left-side">
                    <img src="{{asset('frontend/image/feature-product/pic-1.jpg')}}" class="img-fluid" alt="">
                </div>

            </div>
            <div class="col-md-6">
                <div class="feature-img-box right-side">
                    <img src="{{asset('frontend/image/feature-product/pic-2.jpg')}}" class="img-fluid" alt="">
                </div>

            </div>

        </div>
    </div>
</div>
<!-- feature product section end -->

<!-- shop section start -->
<div class="shop-section">
    <div class="container-fluid2">
        <div class="section-title">
            <h2>Made different because you're different</h2>
            <p>We don't believe in one size fits all. Form every day balance to targeted rellief, our probiotics are created with a variety of unque needs in mind.</p>
        </div>
        <div class="row mt-5">
            @foreach($products as $product)
            <div class="col-md-3">
                <a href="/singleProduct/{{$product->_id}}">
                    <div class="shop-box bg-1">
                        <div class="shop-img">
                            <img src="{{asset('attachment/product/'.$product->thumbnail)}}" class="img-fluid" alt="">
                        </div>
                    </div>
                </a>

            </div>
            @endforeach

            <div class="col-md-3">
                <div class="shop-btn-container">
                    <a href="/products" class="shop-btn">Shop All</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shop section end -->


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


<!-- testimonials section start -->
<div class="testimonials-section">
    <div class="container-fluid2">
        <div class="row">
            <div id="testimonial-carousel" class="owl-carousel owl-theme">
                @foreach($testimonials as $testimonial)
                <div class="item">
                    <div class="testimonials-box bg-1">
                        <div class="testimonials-rating">
                            <div class="rating-container">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                        </div>

                        <div class="testimonial-title">
                            <h2>{{$testimonial->title}}</h2>
                        </div>

                        <div class="testimonial-des">
                            <p>{{$testimonial->description}}</p>
                        </div>
                        <div class="testimonial-name">
                            <h3>{{$testimonial->designation}}</h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- testimonials section end -->

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
<!-- end content -->

@endsection