 <!-- header start -->
 <div class="header-section">
     <nav class="navbar navbar-expand-md main-nav">
         <div class="container-fluid2">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse left-side-nav w-100">
                 <ul class="nav navbar-nav w-100">
                     <li class="nav-item active">
                         <a class="nav-link" href="#">Shop</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">WhyRooted</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">Learn</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">Offers</a>
                     </li>
                 </ul>
             </div>
             <a class="navbar-brand order-first order-md-0 mx-0" href="home"> <img src="{{asset('frontend/image/logo/logo-2.png')}}" alt="" class="main-logo"> </a>
             <div class="collapse navbar-collapse w-100 right-side-nav">
                 <ul class="nav navbar-nav mr-auto">
                     <li class="nav-item">
                         <form class="search-container">
                             <input class="form-control mr-sm-2" type="text" placeholder="Search...">
                             <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                         </form>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#"><i class="fas fa-user-circle"></i></a>
                     </li>
                     <li class="nav-item cart-wrapper">
                         <a class="nav-link  cart-info" href="javascript:void"><i class="fas fa-shopping-cart"></i></a>
                     </li>
                 </ul>
             </div>


         </div>
     </nav>
 </div>

 <div class="cart-info-container">
     <div class="shopping-cart-price-info">
         <div class="shopping-cart-item-contianer mb-4">
             <div class="shopping-cart-item">
                 <div class="shopping-cart-img">
                     <img src="{{asset('frontend/image/product/product-img.png')}}" class="img-fluid" alt="">
                 </div>

                 <div class="shopping-cart-info">
                     <h3>Reishi Mushroom Powder <span class="shopping-cart-price">Rs 885/-</span></h3>
                     <p>Soft Gels - 90 Count - Lemon (Gelatin)</p>

                     <div class="product-quantity">
                         <div class='counter'>
                             <div class='down' onclick='decreaseCount(event, this)'>-</div>
                             <input type='text' value='1' id="product-quantity">
                             <div class='up' onclick='increaseCount(event, this)'>+</div>
                         </div>

                     </div>
                 </div>

             </div>




         </div>

         <div class="cart-relative-product">
             <div id="related-product1" class="owl-carousel owl-theme">
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
                             <img src="{{asset('frontend/product/product-img.png')}}" alt="">
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
                             <img src="{{asset('frontend/product/product-img.png')}}" alt="">
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



             <div class="shopping-total mt-5">
                 <div class="shopping-total-table cart-info ">
                     <table class="table table-borderless">
                         <tr class="border-top">
                             <td>Shipping</td>
                             <td>Free Standard Shipping</td>
                         </tr>
                         <tr>
                             <td>Sub total</td>
                             <td>Rs 885/-</td>
                         </tr>

                     </table>

                 </div>

                 <div class="discount cart-info1">
                     <div class="input-group mb-3">
                         <span class="input-group-text"><img src="{{asset('frontend/image/icon/discount.png')}}" alt=""></span>
                         <input type="text" class="form-control" placeholder="Rooted Point or discount code">
                         <span class="input-group-text"> <button type="submit" class="apply-btn">Apply</button> </span>
                     </div>
                 </div>

                 <div class="checkout-btn-container">
                     <a href="#" class="checkout-btn">CheckOut</a>
                 </div>

             </div>

         </div>


     </div>
 </div>
 <!-- header end -->