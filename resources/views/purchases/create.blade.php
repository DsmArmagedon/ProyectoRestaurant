@extends('layout')
@extends('siderbar')
@section('head')
<link href="{{asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('pages/css/ajustes.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('title')
Compra de Producto
@endsection
@section('content')
@include('flash::message')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="portlet mt-element-ribbon light portlet-fit bordered">
            <div class="ribbon ribbon-vertical-right ribbon-shadow ribbon-color-primary uppercase">
                <div class="ribbon-sub ribbon-bookmark"></div>
                <i class="fa fa-star" ></i>
            </div>
            <div class="portlet-title">
                <div class="caption">
                    <h3><i class=" glyphicon glyphicon-cutlery font-green"></i>
                        <span class="caption-subject font-green bold uppercase">COMPRA DE PRODUCTO</span></h3>
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
                <form action="{{route('purchases.store')}}" method="POST" id="formPurchase">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="single-append-text" class="control-label">SELECCIONAR EL PRODUCTO</label>
                                <div class="input-group select2-bootstrap-append">
                                    <select id="single-append-text" data-url="{{route('products.get-product',':ID')}}" name="product_id" class="form-control select2-allow-clear validate[required]" data-placeholder='Seleccionar Producto'>
                                        <option></option>
                                        @foreach($products as $product)
                                            <option  value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button" data-select2-open="single-append-text">
                                            <span class="glyphicon glyphicon-search"></span>. 
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="control-label col-md-6">FECHA</label>

                                <div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                    <input type="text" class="form-control" name="date_purchase" value='{{date("d-m-Y")}}' readonly>
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
                                <label name="quantity">CANTIDAD COMPRADA</label>
                                <input name="quantity" type="text" class="form-control validate[required,custom[onlyNumberSp]]" placeholder="Cantidad Comprada">
                            </div>
                            <div class="form-group">
                                <label>EXISTENCIAS</label>
                                <input id="existence" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>UNIDAD</label>
                                <input id="unit" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image" class="control-label">IMAGEN</label>
                                <div class="form-group space">
                                    <img class="thumbnail" id="imagenProducto" style="width: 200px;height:180px" src="{{asset('images/products/sinImagenProducto.jpg')}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">DESCRIPCION</label>
                                <textarea name="description" class="form-control" rows="3" id="comment"></textarea>
                            </div>
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
    <div class="col-md-3"></div>
</div>

@stop

@section('scripts')
<script src="{{asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
<script src="{{asset('pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('apps/scripts/purchases/create.js') }}" type="text/javascript"></script>
@endsection