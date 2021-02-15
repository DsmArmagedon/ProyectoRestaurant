@extends('layout')
@extends('siderbar')
@section('head')
<link href="{{asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('pages/css/ajustes.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('title')
Mostrar Venta
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
                    <h3><i class=" fa fa-coffee font-green"></i>
                        <span class="caption-subject font-green bold uppercase">VENTA</span></h3>
                </div>
            </div>
            <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>EMPLEADO</strong></label>
                                <input type="text" value="{{$sale->user->name.' '.$sale->user->first_name.' '.$sale->user->last_name}}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>FECHA</strong></label>
                                <input type="text" value="{{$sale->date_sale}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>MESA</strong></label>
                                <input type="text" value="{{$sale->number_table}}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>TOTAL VENTA</strong></label>
                                <input type="text" value="{{$sale->total}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>DESCRIPCION</strong></label>
                                <input type="text" name="description" class="form-control" value="{{$sale->description}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h5><span class="caption-subject font-green bold uppercase">Detalle de Venta</span></h5>
                    </div>
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                
                                <table class="table table-striped table-bordered table-condensed table-hover">
                                    <thead style="background-color:#a9d0f5">
                                    <tr>
                                        <th>PLATO</th>
                                        <th>CANTIDAD</th>
                                        <th>PRECIO</th>
                                        <th>SUBTOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sale->details_sale as $details)
                                    <tr>
                                        <td>{{$details->plate->name}}</td>
                                        <td align="center"> {{$details->quantity}}</td>
                                        <td align="center">{{$details->price_unit}}</td>
                                        <td align="center">{{(($details->price_unit) *($details->quantity))}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="panel-footer">                
                <a href="{{ route('sales.index')}}" class="btn green btn-outline">
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
<script src="{{asset('apps/scripts/sales/create.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/bootbox/bootbox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('pages/scripts/ui-bootbox.min.js') }}" type="text/javascript"></script>
@endsection