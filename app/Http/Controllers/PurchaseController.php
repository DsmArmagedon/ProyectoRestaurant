<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ProductRepository;
use App\Repositories\PurchaseRepository;
use App\Managers\PurchaseManager;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    protected $productRepository;
    protected $purchaseRepository;
    
    public function __construct(ProductRepository $productRepository,PurchaseRepository $purchaseRepository) {
        $this->productRepository = $productRepository;
        $this->purchaseRepository = $purchaseRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        $purchases  = $this->purchaseRepository->all();
        return view('purchases.index')->with('purchases',$purchases);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products =$this->productRepository->findAllByStatus();
        return view("purchases.create")->with('products',$products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase = $this->purchaseRepository->newUser();
        $purchase->status = $request->get('status',1);
        $fecha = strtotime( $request->get('date_purchase'));
        $newFormatDate = date('Y-m-d',$fecha);
        $response = $request->all();
        $response['date_purchase'] = $newFormatDate;
        $manager = new PurchaseManager($purchase);
        
        $manager->setData($response);
        if ($manager->save()) {
            $productId = $request->get('product_id');
            $product = $this->productRepository->find($productId);
            $product->existence = $request->get('quantity') + $product->existence;
            $product->save();
            
            flash('¡COMPRA registrada correctamente!', 'success');
            return redirect()->route('purchases.create');
        } else {
            return redirect()->back()->withInput()->withErrors($manager->getValidation());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $purchase = $this->purchaseRepository->find($id);
            $productId = $purchase->product_id;
            $product = $this->productRepository->find($productId);
            $product->existence = $product->existence - $purchase->quantity;
            $manager = new PurchaseManager($purchase);
            $manager->delete();
            $product->save();
            
            flash('¡COMPRA elimininada Correctamente!', 'success');
        } catch (Exception $ex) {
            flash('¡Error al eliminar la COMPRA!', 'danger');
        }
        return redirect()->route('purchases.index');
    }
    
    public function status($id) {
        $purchase = $this->purchaseRepository->find($id);
        $manager = new PurchaseManager($purchase);
        $message = $manager->status();
        flash($message, 'success');
        return redirect()->route('purchases.index');
    }

    public function getPurchase(Request $request, $id){
        if($request->ajax()){
            $purchase =(object) $this->purchaseRepository->find($id);
            $product = (object) $this->purchaseRepository->find($id)->product;
            $result =['purchase'=>$purchase,'product'=>$product];
            return Response()->Json($result);
            
        }
    }
}
