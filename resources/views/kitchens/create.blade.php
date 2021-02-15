@extends('layout')
@extends('siderbar')
@section('head')
<link href="{{asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('title')
Plato a Cocinar
@endsection
@section('content')
@include('flash::message')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="portlet mt-element-ribbon light portlet-fit bordered">
            <div class="ribbon ribbon-vertical-right ribbon-shadow ribbon-color-primary uppercase">
                <div class="ribbon-sub ribbon-bookmark"></div>
                <i class="fa fa-star" ></i>
            </div>
            <div class="portlet-title">
                <div class="caption">
                    <h3><i class=" glyphicon glyphicon-cutlery font-green"></i>
                        <span class="caption-subject font-green bold uppercase">PLATO A COCINAR</span></h3>
                </div>
            </div>
            @if($errors->has())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach    
                </ul>
            </div>
            @endif
            <div class="panel-body">
                <form action="{{route('kitchens.store')}}" method="POST" id="formKitchen" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label name="user">EMPLEADO</label>
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="text" value="{{Auth::user()->name .' '.Auth::user()->first_name.' '.Auth::user()->last_name}}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-6">FECHA</label>
                                <div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-vi   ewmode="years">
                                    <input type="text" class="form-control" name="date_kitchen" value='{{date("d-m-Y")}}' readonly>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-calendar"></i>.
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="single-append-text" class="control-label">PLATO A PRODUCIR</label>
                                <div class="input-group select2-bootstrap-append">
                                    <select id="selectPlate" data-url="{{route('plates.get-plate',':ID')}}" name="plate_id" class="form-control select2-allow-clear validate[required] text-input" data-placeholder='Seleccionar Plato'>
                                        <option></option>
                                        @foreach($plates as $plate)
                                        <option  value="{{$plate->id}}">{{$plate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label name="existence_quantity">CANTIDAD DE PLATOS</label>
                                <input id="existence_qty" name="existence_plate"type="number" min="1" class="form-control" value="1" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h5><span class="caption-subject font-green bold uppercase">Detalle de Productos</span></h5>
                    </div>
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="single-append-text" class="control-label">INGREDIENTE</label>
                                        <div class="input-group select2-bootstrap-append">
                                            <select id="selectProduct" data-url="{{route('products.get-product',':ID')}}" name="product_id" class="form-control select2-allow-clear" >
                                                <option></option>
                                                @foreach($products as $product)
                                                <option value="{{$product->id}}_{{$product->existence}}_{{$product->unit}}" >{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" >
                                        <label>STOCK</label>
                                        <input id="existence" type="text" class="form-control" readonly >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>UNIDAD</label>
                                        <input id="unit" type="text" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label >CANTIDAD</label>
                                        <input id="quantity" type="number" class="form-control" min="0" step="0.1" max="100" value="1">
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <button type="button" class="btn btn-circle purple btn-block btn-outline btn-xs" id="agregar"><i class="fa fa-plus"></i> AGREGAR PRODUCTO</button>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>

                            <table id="tableDetails" class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>PRODUCTO</th>
                                        <th>CANTIDAD</th>
                                        <th>UNIDAD</th>
                                        <th width="50px">ACCION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Datos Llenados con el detalle que se inserta-->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{ csrf_field() }}
                </form>
            </div>
            <div class="panel-footer">                
                <button id="save" class="btn blue btn-outline">
                    <i class="fa fa-save"></i>
                    Guardar
                </button>
                <a href="{{ route('home')}}" class="btn green btn-outline">
                    <i class="fa fa-close" ></i>
                    Cancelar
                </a>                          
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>

@stop

@section('scripts')
<script src="{{asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
<script src="{{asset('pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('apps/scripts/kitchens/create.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/bootbox/bootbox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('pages/scripts/ui-bootbox.min.js') }}" type="text/javascript"></script>
@endsection