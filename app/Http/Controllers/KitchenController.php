<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PlateRepository;
use App\Repositories\ProductRepository;
use App\Repositories\KitchenRepository;
use App\Repositories\DetailsKitchenRepository;
use App\Managers\KitchenManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class KitchenController extends Controller
{
    protected $plateRepository;
    protected $productRepository;
    protected $kitchenRepository;
    protected $detailsKitchenRepository;
    public function __construct(PlateRepository $plateRepository, ProductRepository $productRepository, KitchenRepository $kitchenRepository,DetailsKitchenRepository $detailsKitchenRepository) {
        $this->plateRepository = $plateRepository;
        $this->productRepository=$productRepository;
        $this->kitchenRepository=$kitchenRepository;
        $this->detailsKitchenRepository =$detailsKitchenRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kitchens = $this->kitchenRepository->all();
        
        return view('kitchens.index')->with('kitchens',$kitchens);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plates =$this->plateRepository->findAllByStatus();
        $products = $this->productRepository->findAllByStatus();
        return view('kitchens.create')
                ->with('plates',$plates)
                ->with('products',$products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $kitchen = $this->kitchenRepository->newUser();
            $kitchen->user_id = $request->get('user_id');
            $kitchen->plate_id = $request->get('plate_id');
            $kitchen->date_kitchen = $request->get('date_kitchen');
            $kitchen->existence_plate= $request->get('existence_plate');
            $kitchen->status = true;
            $response = $request->all();
            $response['date_kitchen']=date('Y-m-d', strtotime($request->get('date_kitchen')));
            $manager = new KitchenManager($kitchen);
            $manager->setData($response);
            if($manager->save())
            {
                $productId =$request->get('product_id');
                $quantityK = $request->get('quantity_kitchen');
                for($i=0;$i<count($productId);$i++)
                {
                    $detailsKitchen = $this->detailsKitchenRepository->newUser();
                    $detailsKitchen->kitchen_id = $kitchen->id;
                    $detailsKitchen->product_id = $productId[$i];
                    $detailsKitchen->quantity_kitchen =$quantityK[$i];
                    $detailsKitchen->status = 1;
                    $detailsKitchen->save();
                }
                flash('¡PLATO A COCINAR registrado correctamente!','success');
                return redirect()->route('kitchens.create');
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
        $kitchen = $this->kitchenRepository->find($id);
        return view('kitchens.show')->with('kitchen',$kitchen);
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
            $kitchen = $this->kitchenRepository->findOrFail($id);
            $details = $kitchen->details_kitchen;
            foreach ($details as $item){
                $product = $this->productRepository->find($item->product_id);
                $product->existence = $product->existence + $item->quantity_kitchen;
                $product->save();
            }
            $kitchen->delete();
            flash('¡PLATO COCINADO eliminado correctamente!','success');
            return redirect()->route('kitchens.index');
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
        }
            
        
    }
}
