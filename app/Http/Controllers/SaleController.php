<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PlateRepository;
use App\Repositories\SaleRepository;
use App\Repositories\DetailsSaleRepository;
use App\Managers\SaleManager;

class SaleController extends Controller
{
    protected  $plateRepository;
    protected $saleRepository;
    protected $detailsSaleRepository;
    
    public function __construct(PlateRepository $plateRepository, SaleRepository $saleRepository, DetailsSaleRepository $detailsSaleRepository) {
        $this->plateRepository = $plateRepository;
        $this->saleRepository = $saleRepository;
        $this->detailsSaleRepository = $detailsSaleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = $this->saleRepository->all();
        return view ('sales.index')->with('sales',$sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plates = $this->plateRepository->findAllByStatus();
        return view('sales.create')->with('plates',$plates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = $this->saleRepository->newUser();
        $sale -> status = true;
        $response = $request->all();
        $response['date_sale']=date('Y-m-d', strtotime($request->get('date_sale')));
        $manager = new SaleManager($sale);
        $manager->setData($response);
        if($manager->save())
            {
                $plateId =$request->get('plate_id');
                $quantity = $request->get('quantity');
                $price_unit = $request->get('price_unitary');
                for($i=0;$i<count($plateId);$i++)
                {
                    $detailsSale = $this->detailsSaleRepository->newUser();
                    $detailsSale->sale_id = $sale->id;
                    $detailsSale->plate_id = $plateId[$i];
                    $detailsSale->quantity = $quantity[$i];
                    $detailsSale->price_unit =$price_unit[$i];
                    $detailsSale->status = 1;
                    $detailsSale->save();
                }
                flash('¡PLATO VENDIDO registrado correctamente!','success');
                return redirect()->route('sales.create');
            }
            else
            {
                return redirect()->back()->withInput()->withErrors($manager->getValidation());
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = $this->saleRepository->find($id);
        return view('sales.show')->with('sale',$sale);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $sale = $this->saleRepository->findOrFail($id);
            $details = $sale->details_sale;
            foreach ($details as $item){
                $plate = $this->plateRepository->find($item->plate_id);
                $plate->existence = $plate->existence - $item->quantity;
                $plate->save();
            }
            $sale->delete();
            flash('¡VENTA eliminada correctamente!','success');
            return redirect()->route('sales.index');
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
        }
    }
}
