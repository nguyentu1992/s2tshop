<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $productService;
    protected $categoryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $listProducts = $this->productService->getList();
            $listCategorys = $this->categoryService->getList();
            $listCookieProducts = $this->productService->getCookieProductRecommend();
            return view('layouts.home', [
                'listProducts' => $listProducts,
                'listCategorys' => $listCategorys,
                'listCookieProducts' => $listCookieProducts
            ]);
        }
        catch (\Exception $exception) {
            abort('404');
            echo $exception->getMessage();
        }
    }
}
