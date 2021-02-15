<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Managers\PlateManager;
use App\Repositories\PlateRepository;
use App\Http\Controllers\Controller;

class PlateController extends Controller
{
    protected $plateRepository;
    public function __construct(PlateRepository $plateRepository) {
        $this->plateRepository=$plateRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates= $this->plateRepository->all();
        return view('plates.index')->with('plates', $plates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plate = $this->plateRepository->newUser();
        $plate->existence = $request->get('existence',0);
        $plate->status = $request->get('status');
        
        if ($request->hasFile('image')) {
            $plate->image = true;
            $plate->extension = $request->file('image')->getClientOriginalExtension();
        }
        $response = $request->all();

        $manager = new PlateManager($plate);

        $manager->setData($response);
        
        if ($manager->save()) {
            if ($request->hasFile('image')) {
                $manager->saveImage('images', 'plates');
            }
            flash('¡Plato CREADO correctamente!', 'success');
            return redirect()->route('plates.index');
        } else {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plate = $this->plateRepository->find($id);
        $view = view('plates.edit');
        $view->with('plate', $plate);
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
        $plate = $this->plateRepository->find($id);

        $plate->status = $request->get('status');

        if ($request->hasFile('image')) {
            $plate->image = true;
            $plate->extension = $request->file('image')->getClientOriginalExtension();
        }
        $response = $request->all();

        $manager = new PlateManager($plate);

        $manager->setData($response);
        if ($manager->save()) {
            if ($request->hasFile('image')) {
                $manager->saveImage('images', 'plates');
            }
            flash('¡Plato MODIFICADO correctamente!', 'success');
            return redirect()->route('plates.index');
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
    public function status($id) {
        $plate = $this->plateRepository->find($id);
        $manager = new PlateManager($plate);
        $message = $manager->status();
        flash($message, 'success');
        return redirect()->route('plates.index');
    }
    
    public function getPlate(Request $request, $id){
        if($request->ajax()){
            $plate = $this->plateRepository->find($id);
            return response()->json($plate);
        }
    }
}
