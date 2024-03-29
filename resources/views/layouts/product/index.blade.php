@extends('layouts.master')
@section('title', 'Products')
 
@section('content')

    <section id="advertisement">
        <div class="container">
            <img src="{{asset('/layouts/images/shop/advertisement.jpg')}}" alt="" />
        </div>
    </section>

    <section>
        <div class="container">
            @if(isset($listProduct) && count($listProduct) > 0)
            <div class="row">
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @foreach ($listProduct as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('/layouts/images/shop/product9.jpg')}}" alt="" />
                                            <h2>{{$product->price}}</h2>0
                                            <p>{{$product->name}}</p>
                                            <a href="javascript: return false;" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                            <a href='{{url("product/detail/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{$product->price}}</h2>
                                                <p>{{$product->name}}</p>
                                                <a href="javascript: return false;" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                                <a href='{{url("product/detail/$product->id")}}' class="btn btn-default add-to-cart view-detail" >
                                                    <i class="fa fa-info"></i>View Details
                                                    <input type="hidden" value="{{ $product->id }}">
                                                </a>
                                            </div>
                                        </div>
                                        <img src="{{ asset('layouts/images/home/new.png') }}" class="new" alt="">
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div><!--features_items-->
                </div>


            </div>
{{--            <div class="row div-pagination padding-left">--}}
{{--                <ul class="pagination">--}}
{{--                    <li class="active"><a href="/product/{!! $listProduct->currentPage() !!}">1</a></li>--}}
{{--                    <li><a href="/product/{!! $listProduct->currentPage() + 1 !!}">2</a></li>--}}
{{--                    <li><a href="/product/{!! $listProduct->currentPage() + 2 !!}">3</a></li>--}}
{{--                    <li><a href="/product/{!! $listProduct->lastPage() !!}">»</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
                {{ $listProduct->links() }}
            @else
                <h1>Không có data</h1>
            @endif
        </div>
    </section>
 
@endsection