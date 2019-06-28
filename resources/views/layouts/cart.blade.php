@extends('layouts.master')
@section('title', 'Cart')
 
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                @if(isset($cart))
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $item)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="images/cart/one.png" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$item->name}}</a></h4>
                                    <p>Web ID: {{$item->id}}</p>
                                </td>
                                <td class="cart_price">
                                    <p>${{$item->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href='{{route('cart', ['product_id'=> $item->id, 'increment' => 1])}}'> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href='{{route('cart', ['product_id'=> $item->id, 'decrease' => 1])}}'> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">${{$item->subtotal}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{url("cart?product_id=$item->id&decrease=1")}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Bạn chưa chọn món đồ nào, có nhiều hàng đẹp lắm, chọn tiếp nhé!</p>
                @endif
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>Xin mời bạn chọn tiếp!</h3>
                <p>Chọn nếu bạn có mã giảm giá hoặc điểm thưởng bạn muốn sử dụng hoặc muốn ước tính chi phí giao hàng của bạn.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Sử dụng coupon code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Sử dụng voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Thuế giá trị gia tăng</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{ Cart::subtotal() }} VND</span></li>
                            <li>Thuế giá trị gia tăng <span>0$</span></li>
                            <li>Phí ship <span>Miễn phí</span></li>
                            <li>Tổng tiền: <span>{{Cart::total()}} VND</span></li>
                        </ul>
                        <a class="btn btn-default update" href="{{url('clear-cart')}}">Clear Cart</a>
                        <a class="btn btn-default check_out" href="{{url('checkout')}}">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
 
@endsection