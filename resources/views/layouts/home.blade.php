@extends('layouts.master')
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        @if($listProducts)
        @foreach($listProducts as $listProduct)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ asset('layouts/images/home/product1.jpg') }}" alt="" />
                        <h2>{{ $listProduct->price }} VND</h2>
                        <p>{{ $listProduct->desc }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{ $listProduct->price }} VND</h2>
                            <p>{{ $listProduct->desc }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div><!--features_items-->

    <div class="category-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#sportwear" data-toggle="tab">Bộ thể thao</a></li>
                <li><a href="#tshirt" data-toggle="tab">Áo phông thụng</a></li>
                <li><a href="#lacoste" data-toggle="tab">Quần bò</a></li>
                <li><a href="#balo" data-toggle="tab">Balo</a></li>
                <li><a href="#handbag" data-toggle="tab">Túi xách</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="sportwear" >
                @for($i = 0; $i < 4; $i++)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('layouts/images/home/gallery1.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>

                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <div class="tab-pane fade" id="tshirt" >
                @for($i = 0; $i < 4; $i++)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('layouts/images/home/gallery1.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>

                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <div class="tab-pane fade" id="lacoste" >
                @for($i = 0; $i < 4; $i++)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('layouts/images/home/gallery1.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>

                        </div>
                    </div>
                </div>
                @endfor

            </div>

            <div class="tab-pane fade" id="balo" >
                @for($i = 0; $i < 4; $i++)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('layouts/images/home/gallery1.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>

                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <div class="tab-pane fade" id="handbag" >
                @for($i = 0; $i < 4; $i++)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('layouts/images/home/gallery1.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>

                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div><!--/category-tab-->

    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">Sản phẩm đã xem</h2>

        @if($listCookieProducts)
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($listCookieProducts as $k => $listCookieProduct)
                        <div class="item {{ $k < 3 ? 'active' : '' }}">
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('layouts/images/home/recommend1.jpg') }}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        @endif
    </div><!--/recommended_items-->
@endsection