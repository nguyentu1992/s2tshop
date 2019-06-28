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
                        <a href="javascript: return false;" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>
                            Thêm vào giỏ hàng
                            <input type="hidden" value="{{ $listProduct->id }}">
                        </a>
                        <a href='{{url("product/detail/$listProduct->id")}}' class="btn btn-default add-to-cart view-detail" >
                            <i class="fa fa-info"></i>View Details
                            <input type="hidden" value="{{ $listProduct->id }}">
                        </a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{ $listProduct->price }} VND</h2>
                            <p>{{ $listProduct->desc }}</p>
                            <a href="javascript: return false;" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>
                                Thêm vào giỏ hàng
                                <input type="hidden" value="{{ $listProduct->id }}">
                            </a>
                            <a href='{{url("product/detail/$listProduct->id")}}' class="btn btn-default add-to-cart view-detail" >
                                <i class="fa fa-info"></i>View Details
                                <input type="hidden" value="{{ $listProduct->id }}">
                            </a>
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
                @if($listCategoryTabs)
                    @foreach($listCategoryTabs as $k => $listCategoryTab)
                        <li class="{{$k == 0 ? 'active' : ''}}"><a href="#catetab-{{$k}}" data-toggle="tab">{{ $listCategoryTab->name }}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="tab-content">
            @if($listCategoryTabs)
            @foreach($listCategoryTabs as $k => $listCategoryTab)
            <div class="tab-pane fade active in" id="#catetab-{{$k}}" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('layouts/images/home/gallery1.jpg') }}" alt="" />
                                <h2>{{ $listCategoryTab->price }} VND</h2>
                                <p>{{ $listCategoryTab->name }}</p>
                                <a href="javascript: return false;" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                <a href='{{url("product/detail/$listCategoryTab->id")}}' class="btn btn-default add-to-cart view-detail" >
                                    <i class="fa fa-info"></i>View Details
                                    <input type="hidden" value="{{ $listCategoryTab->id }}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
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
                                            <h2>{{ $listCookieProduct->price }} VND</h2>
                                            <p>{{ $listCookieProduct->name }}</p>
                                            <a href="javascript: return false;" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                            <a href='{{url("product/detail/$listCookieProduct->id")}}' class="btn btn-default add-to-cart view-detail" >
                                                <i class="fa fa-info"></i>View Details
                                                <input type="hidden" value="{{ $listCookieProduct->id }}">
                                            </a>
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