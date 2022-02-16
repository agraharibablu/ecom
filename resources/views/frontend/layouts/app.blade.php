<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('frontend/image/logo/favicon.png')}}" type="image/x-icon">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">

    <!-- boxicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.1/css/boxicons.min.css" />
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/style-2.css')}}">


</head>

<body>
    <!-- header start -->
    @include('frontend.layouts.header')
    <!-- header end -->
    <!-- offer-container start -->
    <div class="offer-container">
        <p>Free Shipping | COD Available</p>
    </div>
    <!-- offer-container end -->


    	<!-- start content -->
   @yield('content')
      	<!-- end content -->

    <!-- footer include start -->
    @include('frontend.layouts.footer')
    <!-- footer include end -->

    <!-- jquery  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Boxicons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.1/dist/boxicons.min.js"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/main-2.js')}}"></script>
    @yield('scripts')
</body>

</html>