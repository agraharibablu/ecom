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


    <div class="checkout-main-container">
        <div class="container-fluid2">
            <div class="row">
                <div class="col-md-6">
                    <div class="checkout-step-container">
                        <!-- multistep form -->
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active">Information</li>
                                <li>Shipping</li>
                                <li>Payment</li>

                            </ul>
                            <!-- fieldsets -->

                            <!-- phone-varification start -->
                            <fieldset>
                                <div class="checkout-content-container">
                                    <span class="checkout-field-num">1</span>
                                    <div class="checkout-content">
                                        <h2 class="checkout-field-title"> Phone Number Verification</h2>
                                        <p class="sub-des">We need your phone number so that we can update you
                                            about your order.</p>

                                        <div class="mb-3">
                                            <label for="mobile" class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control mobile-field" id="mobile" placeholder="+91">
                                        </div>
                                        <button class="send-otp-btn">Send OTP</button>
                                    </div>

                                </div>
                                <div class="checkout-content-container checkoutfield-heading b-bottom">
                                    <span class="checkout-field-num">2</span>
                                    <div class="checkout-content">
                                        <h2 class="checkout-field-title">Delivery Address</h2>

                                    </div>

                                </div>
                                <div class="checkout-content-container checkoutfield-heading">
                                    <span class="checkout-field-num">3</span>
                                    <div class="checkout-content">
                                        <h2 class="checkout-field-title"> Payment</h2>

                                    </div>

                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>

                            <!-- phone-varification end -->
                            <!-- Shipping Address start -->
                            <fieldset>
                                <div class="checkout-content-container checkoutfield-heading b-bottom">
                                    <span class="checkout-field-num"><i class="fas fa-check"></i></span>
                                    <div class="checkout-content">
                                        <h2 class="checkout-field-title"> Phone Number Verification</h2>
                                        <p class="sub-des">+918168344314</p>
                                    </div>
                                </div>
                                <div class="checkout-content-container b-bottom">
                                    <span class="checkout-field-num">2</span>
                                    <div class="checkout-content  w-100">
                                        <h2 class="checkout-field-title">Shipping Address</h2>
                                        <div class="shipping-address-container">
                                            <div class="form-contianer">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Name">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="email" class="form-control" placeholder="Email Id">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Mobile No">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Address (House, Office, Street, Society)">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Nearest Landmark (optional)">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="City">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="State">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Pincode">
                                                    </div>

                                                </div>


                                                <div class="mb-3 form-check checkbox-field">
                                                    <input type="checkbox" class="form-check-input" id="save-check">
                                                    <label class="form-check-label" for="save-check">Save this information for next time</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="checkout-content-container checkoutfield-heading">
                                    <span class="checkout-field-num">3</span>
                                    <div class="checkout-content">
                                        <h2 class="checkout-field-title"> Payment</h2>

                                    </div>

                                </div>
                                </br>
                                <input type="button" name="previous" class="previous action-button" value="Previous" />
                                <input type="button" name="next" class="next action-button" value="Next" />

                            </fieldset>
                            <!-- Shipping Address end -->
                            <fieldset>
                                <div class="checkout-content-container checkoutfield-heading b-bottom">
                                    <span class="checkout-field-num"><i class="fas fa-check"></i></span>
                                    <div class="checkout-content">
                                        <h2 class="checkout-field-title"> Phone Number Verification</h2>
                                        <p class="sub-des">+918168344314</p>
                                    </div>
                                </div>
                                <div class="checkout-content-container checkoutfield-heading b-bottom">
                                    <span class="checkout-field-num"><i class="fas fa-check"></i></span>
                                    <div class="checkout-content">
                                        <h2 class="checkout-field-title"> Phone Number Verification</h2>
                                        <p class="sub-des">306 & 306A, 3rd Floor, Suncity Success Tower, <br />
                                            Sector 65, Gurugram, Haryana 122005</p>
                                    </div>
                                </div>
                                <div class="checkout-content-container checkoutfield-heading">
                                    <span class="checkout-field-num">3</span>
                                    <div class="checkout-content w-100">
                                        <h2 class="checkout-field-title"> Payment</h2>
                                        <div class="checkout-payment">
                                            <div class="d-flex align-items-start">
                                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Debit Card</button>
                                                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">UPI</button>
                                                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Credit Card</button>
                                                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Wallets</button>
                                                    <button class="nav-link" id="v-pills-ib-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ib" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Internet Banking</button>
                                                    <button class="nav-link" id="v-pills-cod-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cod" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Cash On Delivery</button>
                                                </div>
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                        <div class="debit-card-container">
                                                            <div class="container">
                                                                <div class="page-header">
                                                                    <h1>Add New Card</h1>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="panel panel-default">
                                                                            <div class="panel-heading">
                                                                                <div class="row">
                                                                                    <h3>Payment Details</h3>
                                                                                    <div class="inlineimage"> <img class="img-fluid images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Mastercard-Curved.png"> <img class="img-fluid images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Discover-Curved.png"> <img class="img-fluid images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Paypal-Curved.png"> <img class="img-fluid images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/American-Express-Curved.png"> </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <div role="form" class="debit-card-details">
                                                                                    <div class="row">
                                                                                        <p>Enter Card Details</p>
                                                                                        <div class="col-12">
                                                                                            <div class="form-group">
                                                                                                <div class="input-group"> <input type="tel" class="form-control" placeholder="Card Number" /> <span class="input-group-addon"><span class="fa fa-credit-card"></span></span> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-xs-7 col-md-7">
                                                                                            <div class="form-group"> <input type="tel" class="form-control" placeholder="Valid through MM/YY" /> </div>
                                                                                        </div>
                                                                                        <div class="col-xs-5 col-md-5 pull-right">
                                                                                            <div class="form-group"> <input type="tel" class="form-control" placeholder="CVC" /> </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-xs-12">
                                                                                            <div class="form-group"> <input type="text" class="form-control" placeholder="Name on Card" /> </div>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="mb-3 form-check checkbox-field">
                                                                                        <input type="checkbox" class="form-check-input" id="securely-save-check">
                                                                                        <label class="form-check-label" for="securely-save-check" style="font-size: 10px">Securely Saved this card for checkout next time</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel-footer">
                                                                                <div class="row">
                                                                                    <div class="col-xs-12"> <button class="checkout-payment-btn">Pay Securely 699</button> </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">UPI</div>
                                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Credit Card</div>
                                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Wallets</div>
                                                    <div class="tab-pane fade" id="v-pills-ib" role="tabpanel" aria-labelledby="v-pills-ib-tab">Internet Banking</div>
                                                    <div class="tab-pane fade" id="v-pills-cod" role="tabpanel" aria-labelledby="v-pills-cod-tab">Cash On Delivery</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <input type="button" name="previous" class="previous action-button" value="Previous" />
                                <input type="submit" name="submit" class="submit action-button" value="Pay Now" />
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="col-md-5 offset-md-1">
                    <div class="checkout-item-contianer">
                        <div class="checkout-item">
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

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="checkout-discount">
                        <div class="input-group ">
                            <span class="input-group-text"><img src="./assets/image/icon/discount.png" alt=""></span>
                            <input type="text" class="form-control" placeholder="Rooted Point or discount code">
                        </div>
                        <button class="discount-apply-btn" type="submit">Apply</button>
                    </div>

                    <div class="checkout-pay-container">
                        <table class="table">
                            <tr>
                                <td>Shipping</td>
                                <td>Free Standard Shipping</td>
                            </tr>
                            <tr>
                                <td>Sub Total</td>
                                <td>Rs 885/-</td>
                            </tr>
                        </table>
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
    <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
    <!-- Boxicons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.1/dist/boxicons.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="./assets/js/main-2.js"></script>
    <script src="./assets/js/step-process.js"></script>
</body>

</html>