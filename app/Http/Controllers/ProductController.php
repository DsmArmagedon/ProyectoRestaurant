<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use App\Repositories\ProductRepository;
use App\Managers\ProductManager;

class ProductController extends Controller
{
    protected $productRepository;
    
    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->all();
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $this->productRepository->newUser();
        $product->existence = $request->get('existence',0);
        $product->status = $request->get('status');
        
        if ($request->hasFile('image')) {
            $product->image = true;
            $product->extension = $request->file('image')->getClientOriginalExtension();
        }
        $response = $request->all();

        $manager = new ProductManager($product);

        $manager->setData($response);
        
        if ($manager->save()) {
            if ($request->hasFile('image')) {
                $manager->saveImage('images', 'products');
            }
            flash('¡Producto CREADO correctamente!', 'success');
            return redirect()->route('products.index');
        } else {
            return redirect()->back()->withInput()->withErrors($manager->getValidation());
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        $view = view('products.edit');
        $view->with('product', $product);
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product = $this->productRepository->find($id);

        $product->status = $request->get('status');

        if ($request->hasFile('image')) {
            $product->image = true;
            $product->extension = $request->file('image')->getClientOriginalExtension();
        }
        $response = $request->all();

        $manager = new ProductManager($product);

        $manager->setData($response);
        if ($manager->save()) {
            if ($request->hasFile('image')) {
                $manager->saveImage('images', 'products');
            }
            flash('¡Producto MODIFICADO correctamente!', 'success');
            return redirect()->route('products.index');
        } else {
            return redirect()->back()->withInput()->withErrors($manager->getValidation());
        }
    }

    public function status($id) {
        $product = $this->productRepository->find($id);
        $manager = new ProductManager($product);
        $message = $manager->status();
        flash($message, 'success');
        return redirect()->route('products.index');
    }

    public function getProduct(Request $request, $id){
        if($request->ajax()){
            $product = $this->productRepository->find($id);
            return response()->json($product);
            
        }
    }
}

