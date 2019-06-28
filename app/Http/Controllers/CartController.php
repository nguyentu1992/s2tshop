<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(){
        $cart = Cart::content();
        return view('layouts.cart', compact('cart'));
    }


    public function cart(Request $request){
//        dd(Input::get('product_id'));
        if ($request->isMethod('post')) {
//            $this->data['title'] = 'Giỏ hàng của bạn';
            $product_id = Input::get('product_id');
            $product = $this->productService->findByProductId($product_id);
            $cartInfo = [
                'id' => $product_id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => '1'
            ];
            Cart::add($cartInfo);
            $res['status'] = [
                'code' => 200,
                'result' => 'ok',
                'message' => "Success",
                'appcode' =>  "success"
            ];
            $res['count'] = (string) Cart::count();

            $response = response()->json(
                $res,
                200,
                []
            );
            return $response;
        }

        //increment the quantity
        if (Input::get('product_id') && (Input::get('increment')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Input::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty + 1);
        }

        //decrease the quantity
        if (Input::get('product_id') && (Input::get('decrease')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Input::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty - 1);
        }

        $cart = Cart::content();
        return view('layouts.cart', compact('cart'));
    }
}
