<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Cart;

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
     * 
     */
    public function index()
    {
        try {
            $listProducts = $this->productService->getList();
            $listCategoryTabs = $this->categoryService->getListCateTab();
            $listCategorys = $this->categoryService->getList();
            $listCookieProducts = $this->productService->getCookieProductRecommend();
            return view('layouts.home', [
                'listProducts' => $listProducts,
                'listCategorys' => $listCategorys,
                'listCookieProducts' => $listCookieProducts,
                'listCategoryTabs' => $listCategoryTabs
            ]);
        }
        catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
