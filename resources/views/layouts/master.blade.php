<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>
    <link href="{{ asset('layouts/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('layouts/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('layouts/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('layouts/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('layouts/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('layouts/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('layouts/css/custorm.css') }}" rel="stylesheet">
    <link href="{{ asset('layouts/css/responsive.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('layouts/images/ico/favicon.ico') }}">
</head><!--/head-->

<body>
<!--/header-->
@include("layouts.elements.top")
<!--/slider-->
@include("layouts.elements.slide")
{{--<section>--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12 col-sm-12 col-12 main-section">--}}
{{--                <div class="dropdown">--}}
{{--                    <button type="button" class="btn btn-info" data-toggle="dropdown">--}}
{{--                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">3</span>--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu">--}}
{{--                        <div class="row total-header-section">--}}
{{--                            <div class="col-lg-6 col-sm-6 col-6">--}}
{{--                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">3</span>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">--}}
{{--                                <p>Total: <span class="text-info">$2,978.24</span></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row cart-detail">--}}
{{--                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">--}}
{{--                                <img src="https://images-na.ssl-images-amazon.com/images/I/811OyrCd5hL._SX425_.jpg">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">--}}
{{--                                <p>Sony DSC-RX100M..</p>--}}
{{--                                <span class="price text-info"> $250.22</span> <span class="count"> Quantity:01</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row cart-detail">--}}
{{--                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">--}}
{{--                                <img src="https://cdn2.gsmarena.com/vv/pics/blu/blu-vivo-48-1.jpg">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">--}}
{{--                                <p>Vivo DSC-RX100M..</p>--}}
{{--                                <span class="price text-info"> $500.40</span> <span class="count"> Quantity:01</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row cart-detail">--}}
{{--                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">--}}
{{--                                <img src="https://static.toiimg.com/thumb/msid-55980052,width-640,resizemode-4/55980052.jpg">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">--}}
{{--                                <p>Lenovo DSC-RX100M..</p>--}}
{{--                                <span class="price text-info"> $445.78</span> <span class="count"> Quantity:01</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">--}}
{{--                                <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include("layouts.elements.sidebar")
            </div>
            <div class="col-sm-9 padding-right">
                @yield('content')
            </div>
        </div>
    </div>
</section>
@include("layouts.elements.footer")
<!--/Footer-->
<script src="{{ asset('layouts/js/jquery.js') }}"></script>
<script src="{{ asset('layouts/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('layouts/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('layouts/js/price-range.js') }}"></script>
<script src="{{ asset('layouts/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('layouts/js/main.js') }}"></script>
<script src="{{ asset('layouts/js/category.js') }}"></script>
</body>
</html>