<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Rooted Active Naturals </title>
    <link rel="shortcut icon" href="./assets/image/logo/favicon.png" type="image/x-icon">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">

    <!-- boxicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.1/css/boxicons.min.css" />
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-2.css">


</head>

<body>
    <!-- header start -->
    <?php include "header.php" ?>
    <!-- header end -->


    <div class="page-title-1">
        <div class="container-fluid2">
            <h1>Shopping Cart</h1>
        </div>
    </div>

    <div class="shopping-cart-container section-bg-gray">
        <div class="container-fluid2">
            <div class="row">
                <div class="col-md-6">
                    <div class="shopping-cart-section">
                        <h3>My Cart (2 items) </h3>
                    </div>

                    <div class="shopping-cart-item-contianer mb-4">
                        <div class="shopping-cart-item">
                            <div class="shopping-cart-img">
                                <img src="./assets/image/product/product-img.png" class="img-fluid" alt="">
                            </div>

                            <div class="shopping-cart-info">
                                <h3>Reishi Mushroom Powder <span class="shopping-cart-price">Rs 885/</span></h3>
                                <p>Soft Gels - 90 Count - Lemon (Gelatin)</p>

                                <div class="product-quantity">
                                    <div class='counter'>
                                        <div class='down' onclick='decreaseCount(event, this)'>-</div>
                                        <input type='text' value='1' id="product-quantity">
                                        <div class='up' onclick='increaseCount(event, this)'>+</div>
                                    </div>

                                </div>
                            </div>

                            <div class="shopping-cart-action">
                                <a href="#" class="trash"><i class="far fa-trash-alt"></i></a>
                                <a href="#" class="wishlist"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="shopping-cart-item-contianer mt-4">
                        <div class="shopping-cart-item">
                            <div class="shopping-cart-img">
                                <img src="./assets/image/product/product-img.png" class="img-fluid" alt="">
                            </div>

                            <div class="shopping-cart-info">
                                <h3>Reishi Mushroom Powder <span class="shopping-cart-price">Rs 885/</span></h3>
                                <p>Soft Gels - 90 Count - Lemon (Gelatin)</p>

                                <div class="product-quantity">
                                    <div class='counter'>
                                        <div class='down' onclick='decreaseCount(event, this)'>-</div>
                                        <input type='text' value='1' id="product-quantity">
                                        <div class='up' onclick='increaseCount(event, this)'>+</div>
                                    </div>

                                </div>
                            </div>

                            <div class="shopping-cart-action">
                                <a href="#" class="trash"><i class="far fa-trash-alt"></i></a>
                                <a href="#" class="wishlist"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="shopping-btn-container">
                        <a href="#" class="continue-btn">Continue Shopping</a>
                    </div>
                </div>

                <div class="col-md-5 offset-md-1">
                    <div class="shopping-cart-price-info">
                        <h4>Cart Total</h4>

                        <div class="shopping-cart-item-info">
                            <table class="table">
                                <tr>
                                    <td>Price (2 items)</td>
                                    <td>₹ 855</td>
                                </tr>
                                <tr>
                                    <td>Discount on MRP</td>
                                    <td>₹ 120</td>
                                </tr>
                                <tr>
                                    <td>Delivery Charges</td>
                                    <td>Free</td>
                                </tr>
                            </table>

                            <hr>
                        </div>

                        <div class="shopping-total mt-5">
                            <p><strong>Total Amount</strong></p>
                            <div class="shopping-total-table ">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>You will save ₹180 on this order</td>
                                        <td>₹ 735</td>
                                    </tr>

                                </table>

                            </div>

                            <div class="discount">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><img src="./assets/image/icon/discount.png" alt=""></span>
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
        </div>
    </div>

    <!-- footer include start -->
    <?php include "footer.php" ?>
    <!-- footer include end -->

    <!-- jquery  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Boxicons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.1/dist/boxicons.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="./assets/js/main-2.js"></script>
</body>

</html>