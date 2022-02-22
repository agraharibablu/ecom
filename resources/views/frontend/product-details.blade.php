@extends('frontend.layouts.app')

@section('title')
Product Detail Page
@endsection

@section('content')
    <div class="single-product-container  section-bg-gray">
        <div class="container-fluid2">
            <div class="row">
                <div class="col-md-6">
                    <!-- User this HTML for Slider -->

                    <div class="single-detail-banner banner-content clearfix">
                        <div class="banner-slider">
                            <div class="slider slider-for">
                                <div class="slider-banner-image">
                                    <img src="{{asset('frontend/image/product/product-4.jpg')}}" class="img-fluid" alt="product image">
                                </div>
                                <div class="slider-banner-image">
                                    <img src="{{asset('frontend/image/product/product-5.jpg')}}" class="img-fluid" alt="product image">
                                </div>
                                <div class="slider-banner-image">
                                    <img src="{{asset('frontend/image/product/product-4.jpg')}}" class="img-fluid" alt="product image">
                                </div>
                                <div class="slider-banner-image">
                                    <img src="{{asset('frontend/image/product/product-5.jpg')}}" class="img-fluid" alt="product image">
                                </div>

                            </div>
                            <div class="slider slider-nav thumb-image">
                                <div class="thumbnail-image">
                                    <div class="thumbImg">
                                        <img src="{{asset('frontend/image/product/product-4.jpg')}}" class="img-fluid" alt="slider-img">
                                    </div>

                                </div>
                                <div class="thumbnail-image">
                                    <div class="thumbImg">
                                        <img src="{{asset('frontend/image/product/product-5.jpg')}}" class="img-fluid" alt="slider-img">
                                    </div>
                                </div>
                                <div class="thumbnail-image">
                                    <div class="thumbImg">
                                        <img src="{{asset('frontend/image/product/product-4.jpg')}}" class="img-fluid" alt="slider-img">
                                    </div>
                                </div>
                                <div class="thumbnail-image">
                                    <div class="thumbImg">
                                        <img src="{{asset('frontend/image/product/product-5.jpg')}}" class="img-fluid" alt="slider-img">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- End User this HTML for Slider -->

                    <div class="check-delivery-container">
                        <div class="check-delivery-wrapper">
                            <div class="img-group-container">
                                <img src="{{asset('frontend/image/icon/natural.png')}}" alt="">
                                <img src="{{asset('frontend/image/icon/natural.png')}}" alt="">
                                <img src="{{asset('frontend/image/icon/natural.png')}}" alt="">
                                <img src="{{asset('frontend/image/icon/natural.png')}}" alt="">
                            </div>


                            <div class="check-delivery-input-container">
                                <form action="#" class="check-delivery-input">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        <input type="text" class="form-control" placeholder="Check Delivery Date">
                                        <span class="input-group-text"><button class="pincode-btn">Pincode</button></span>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>


                </div>

                <div class="col-md-6">
                    <div class="single-product-info-container">
                        <div class="single-product-wrapper">
                            <div class="single-product-title">
                                <h1 class="product-name">Reishi Mushroom Powder</h1>
                                <p class="single-product-sub-title">4-in-1 immune support supplement</p>
                            </div>

                            <div class="rating-container">
                                <div class="star-container">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                                <div class="rating-num">
                                    <p>4.9 (26)</p>
                                </div>

                                <div class="rating-write">
                                    <a href="#">Write a Review</a>
                                </div>
                            </div>

                            <div class="single-product-short-des">
                                <p>4-in-1 immune support supplement with evidence-based benefits*</p>
                            </div>
                            <div class="single-product-label">
                                <a href="#">View Supplement Label</a>
                            </div>

                            <div class="single-product-cart">
                                <p>Choose an Option:</p>

                                <div class="single-product-cart-option">
                                    <select class="form-select">
                                        <option selected>One Bottle - Rs 850</option>
                                        <option value="1">Two Bottle - Rs 1450</option>
                                        <option value="1">Three Bottle - Rs 2450</option>
                                    </select>

                                    <div class="product-quantity">
                                        <div class='counter'>
                                            <div class='down' onclick='decreaseCount(event, this)'>-</div>
                                            <input type='text' value='1' id="product-quantity">
                                            <div class='up' onclick='increaseCount(event, this)'>+</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="single-product-btn">
                                    <a href="#">Add to Cart</a>
                                </div>

                                <div class="single-product-pointer">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul>
                                                <li>Supports vaginal flora & gut health</li>
                                                <li>Pause, skip & control your deliveries</li>
                                                <li>20 Billion Active CFU</li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul>
                                                <li>Supports vaginal flora & gut health</li>
                                                <li>Pause, skip & control your deliveries</li>
                                                <li>20 Billion Active CFU</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-product-detail">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    How to take
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, libero.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Ingredients
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, libero.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    FAQ
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, libero.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="related-product-container section-bg-gray">
        <div class="container-fluid2">
            <div class="row">
                <div class="col-md-12">

                    <div id="related-product" class="owl-carousel owl-theme">

                        <div class="item">
                            <div class="related-product">
                                <div class="related-product-img">
                                    <img src="{{asset('frontend/image/product/product-img.png')}}" alt="">
                                </div>
                                <div class="related-product-detail">
                                    <div class="related-product-title">
                                        <h4>Resihi Mushroom + Turmeric Curcmumin</h4>
                                    </div>

                                    <div class="related-product-group">
                                        <div class="related-product-price">
                                            <span class="new-price">1200/-</span>
                                            <span class="old-price">1500/-</span>
                                        </div>

                                        <div class="related-product-btn-container">
                                            <a href="#" class="cart-btn">Add to Cart </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="related-product">
                                <div class="related-product-img">
                                    <img src="{{asset('frontend/image/product/product-img.png')}}" alt="">
                                </div>
                                <div class="related-product-detail">
                                    <div class="related-product-title">
                                        <h4>Resihi Mushroom + Turmeric Curcmumin</h4>
                                    </div>

                                    <div class="related-product-group">
                                        <div class="related-product-price">
                                            <span class="new-price">1200/-</span>
                                            <span class="old-price">1500/-</span>
                                        </div>

                                        <div class="related-product-btn-container">
                                            <a href="#" class="cart-btn">Add to Cart </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="related-product">
                                <div class="related-product-img">
                                    <img src="{{asset('frontend/image/product/product-img.png')}}" alt="">
                                </div>
                                <div class="related-product-detail">
                                    <div class="related-product-title">
                                        <h4>Resihi Mushroom + Turmeric Curcmumin</h4>
                                    </div>

                                    <div class="related-product-group">
                                        <div class="related-product-price">
                                            <span class="new-price">1200/-</span>
                                            <span class="old-price">1500/-</span>
                                        </div>

                                        <div class="related-product-btn-container">
                                            <a href="#" class="cart-btn">Add to Cart </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="single-product-full-des">
        <div class="container-fluid2">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="product-description-tab" data-bs-toggle="tab" data-bs-target="#product-description" type="button" role="tab" aria-controls="product-description" aria-selected="true">Product Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="benefits-tab" data-bs-toggle="tab" data-bs-target="#benefits" type="button" role="tab" aria-controls="benefits" aria-selected="false">Benefits</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="product-description" role="tabpanel" aria-labelledby="product-description-tab">
                            <div class="tab-content-container">
                                <h3>Product Description</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae maiores quisquam blanditiis dolorum optio natus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, harum.</p>
                                <p>Lorem ipsum dolor sit amet consectetur alor sit amet consectetur alor sit amet consectetur adipisicing elit. Consequuntur recusandae deleniti quibusdam delectus commodi.</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur recusandae deleniti quibusdam delectus commodi.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="benefits" role="tabpanel" aria-labelledby="benefits-tab">
                            <div class="tab-content-container">
                                <h3>Benefits</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae maiores quisquam blanditiis dolorum optio natus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, harum.</p>
                                <p>Lorem ipsum dolor sit amet consectetur alor sit amet consectetur alor sit amet consectetur adipisicing elit. Consequuntur recusandae deleniti quibusdam delectus commodi.</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur recusandae deleniti quibusdam delectus commodi.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="tab-content-container">
                                <h3>Reviews</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae maiores quisquam blanditiis dolorum optio natus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, harum.</p>
                                <p>Lorem ipsum dolor sit amet consectetur alor sit amet consectetur alor sit amet consectetur adipisicing elit. Consequuntur recusandae deleniti quibusdam delectus commodi.</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur recusandae deleniti quibusdam delectus commodi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
 