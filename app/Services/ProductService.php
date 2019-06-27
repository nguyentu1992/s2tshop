<?php


namespace App\Services;


use App\Repositories\ProductInfoRepository;
use App\Repositories\ProductRepository;
use Jenssegers\Agent\Facades\Agent;


class ProductService extends BaseService
{
    /**
     * @var productRepository
     */
    protected $productRepository;


    /**
     * constructor
     *
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     * @param ProductInfoRepository $productInfoRepository
     */
    public function __construct(
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    /**
     *
     * Get List
     *
     * @param ProductRepository $productRepository
     */

    public function getList(){
        $listProduct = $this->productRepository->listProduct();
        return $listProduct;
    }

    /**
     * Get List with type
     *
     *@param ProductRepository $productRepository
     */
    public function getListWithCategory($category_id){
        $listProduct = $this->productRepository->listProductWithCategory($category_id);
        return $listProduct;
    }

    /**
     * Get detail product
     *
     *@param $product_id
     */
    public function getDetailProduct($product_id){
        $listProduct = $this->productRepository->getDetailProduct($product_id);
        return $listProduct;
    }

    /**
     * Get detail product
     *
     *@param $product_id
     */
    public function findByProductId($product_id){
        $product = $this->productRepository->findByProductId($product_id);
        return $product;
    }

    /**
     * Get detail product
     *
     *@param $product_id
     */
    public function findByCategoryId($categoryId){
        $product = $this->productRepository->findByCategoryId($categoryId);
        return $product;
    }

    /**
     * Save Cookie get data
     *
     * @param $scoreId of SCORE.sid
     *
     * @return Array Score
     */
    public function saveCookieProductInfo($productId)
    {
        if (!empty($_COOKIE['score'])) {
            $cookie = setcookie("score[$productId]", $productId, -1, '/');
            $dataInfo = $_COOKIE['score'];
            if (count($dataInfo) > 30) {
                $cookieRemove = array_shift($dataInfo);
                unset($_COOKIE["score[$cookieRemove]"]);
                setcookie("score[$cookieRemove]", null, -1, '/');
            }

            if (Agent::isMobile() AND !Agent::isTablet()) {
                if (count($dataInfo) > 3) {
                    $dataInfo = array_slice($dataInfo, count($dataInfo) - 3);
                }
            } else {
                if (count($dataInfo) > 5) {
                    $dataInfo = array_slice($dataInfo, count($dataInfo) - 5);
                }
            }
            $limit = (Agent::isMobile() AND !Agent::isTablet()) ? STORE_LIMIT_MOBILE : STORE_LIMIT;
            $scoreCookie = $this->productRepository->getCookieProduct($dataInfo, $limit);
            foreach ($dataInfo as $item) {
                $checkCookie = $this->productRepository->checkCookieScore($item);
                if (empty($checkCookie)) {
                    unset($_COOKIE["score[$item]"]);
                    setcookie("score[$item]", null, -1, '/');
                }
            }

            return $scoreCookie;
        } else {
            $cookie = setcookie("score[$productId]", $productId, -1, '/');
        }

        return array();
    }

}