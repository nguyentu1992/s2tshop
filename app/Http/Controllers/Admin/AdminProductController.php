<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminProductController extends Controller
{
    protected $data;

    public function __construct()
    {
        $this->data = [];
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
    public function create()
    {
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
            dd($request->get('image_id'));
            $product = new Product;
            $product->name = Input::get('txtName');
            $product->content = Input::get('txtContent');
            $product->desc = Input::get('txtDesc');
            $product->price = Input::get('txtPrice');
            $product->category_id = $request->get('cate_id');
            $product->upload_id = $request->get('image_id');
            $product->meta_title = Input::get('meta_title');
            $product->meta_keywords = Input::get('meta_keywords');
            $product->meta_description = Input::get('meta_description');
            $product->save();
            Session::flash('message', "Successfully created product");
            return Redirect::to('admincp/product');
        }
    }

    /**
     * Upload images.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postImages(Request $request)
    {

    }

}
