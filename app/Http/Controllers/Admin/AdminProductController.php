<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Services\UploadService;

class AdminProductController extends Controller
{
    protected $data;
    private $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->data = [];
        $this->uploadService = $uploadService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['title'] = 'List products';
        $productsInfo = DB::table('products')
            ->orderBy('id', 'desc')
            ->paginate(10);
        $this->data['listProduct'] = $productsInfo;
        return view('admin.product.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->uploadService->deleteSessionImage($request);
        $this->data['title'] = 'Add new product';
        $listCate = DB::table('categories')->orderBy('id', 'desc')->get();
        $this->data['listCate'] = $listCate;
        return view('admin.product.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'txtName' => 'required'
        ];
        $validator = Validator::make(Input::all(), $rule);
        if ($validator->fails())
        {
            return Redirect::to('admincp/product/create')
                ->withErrors($validator);
        } else {
            $product = Product::create([
                'name' => Input::get('txtName'),
                'content' => Input::get('txtContent'),
                'desc' => Input::get('txtDesc'),
                'price' => Input::get('txtPrice'),
                'category_id' => $request->get('cate_id'),
                'meta_title' => Input::get('meta_title'),
                'meta_keywords' => Input::get('meta_keywords'),
                'meta_description' => Input::get('meta_description')
            ]);
            $arrId = Input::get('image_id');
            $arrId = explode(',', $arrId);
            foreach($arrId as $id) {
                $upload = $this->uploadService->findByUploadId($id);
                $upload->product_id = $product->id;
                $upload->save();
            }
            $this->uploadService->deleteSessionImage($request);
            Session::flash('message', "Successfully created product");
            return Redirect::to('admincp/product');
        }
    }

}
