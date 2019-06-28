<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.html"><img src="images/home/logo.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="/cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge badge-pill badge-danger quantity-cart">{{ Cart::count() ?: 0  }}</span></a>
                            <li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ route('home') }}" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Áo<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ route('list_product') }}">Sản phẩm hot</a></li>
                                    <li><a href="#">Áo phông</a></li>
                                    <li><a href="#">Áo sơ mi</a></li>
                                    <li><a href="#">Áo thể thao</a></li>
                                    <li><a href="#">Áo cộc</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Quần<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ route('list_product') }}">Sản phẩm hot</a></li>
                                    <li><a href="#">Quần thể thao</a></li>
                                    <li><a href="#">Quần bò</a></li>
                                    <li><a href="#">Quần short</a></li>
                                    <li><a href="#">Áo cộc</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Váy<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ route('list_product') }}">Sản phẩm hot</a></li>
                                    <li><a href="#">Váy baby doll</a></li>
                                    <li><a href="#">Váy</a></li>
                                    <li><a href="#">Váy</a></li>
                                    <li><a href="#">Váy</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Phụ kiện<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ route('list_product') }}">Sản phẩm hot</a></li>
                                    <li><a href="#">Balo</a></li>
                                    <li><a href="#">Thắt lưng da</a></li>
                                    <li><a href="#">Mũ nón</a></li>
                                    <li><a href="#">Ví da</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Khuyến mãi<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ route('list_product') }}">Sản phẩm mới</a></li>
                                    <li><a href="#">50%</a></li>
                                    <li><a href="#">50%</a></li>
                                    <li><a href="#">50%</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Blog của tôi</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->