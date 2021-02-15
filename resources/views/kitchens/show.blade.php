@extends('layout')
@extends('siderbar')
@section('head')
<link href="{{asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('title')
Detalle Plato Cocinado
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
                        <span class="caption-subject font-green bold uppercase">PLATO COCINADO</span></h3>
                </div>
            </div>
            <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label name="user"><strong>EMPLEADO</strong></label>
                                <input type="text" value="{{$kitchen->user->name .' '.$kitchen->user->first_name.' '.$kitchen->user->last_name}}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
<label class="control-label col-md-6"><strong>FECHA</strong></label>
                                <input type="text" value="{{$kitchen->date_kitchen}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="single-append-text" class="control-label"><strong>PLATO</strong></label>
                                 <input type="text" value="{{$kitchen->plate->name}}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label name="existence_quantity"><strong>CANTIDAD DE PLATOS<strong></label>
                                <input type="text" value="{{$kitchen->existence_plate}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h5><span class="caption-subject font-green bold uppercase">Detalle de Productos</span></h5>
                    </div>
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                
                                <table class="table table-striped table-bordered table-condensed table-hover">
                                    <thead style="background-color:#a9d0f5">
                                    <tr>
                                        <th>PRODUCTO</th>
                                        <th>CANTIDAD</th>
                                        <th>UNIDAD</th>
                                        <th>IMAGEN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kitchen->details_kitchen as $details)
                                    <tr>
                                        <td>{{$details->product->name}}</td>
                                        <td align="center"> {{$details->quantity_kitchen}}</td>
                                        <td align="center">{{$details->product->unit}}</td>
                                        <td align="center"><img src="{{asset('images/products/'.$details->product->id.'.'.$details->product->extension)}}" width="60" height="60"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>

                            
                        </div>
                    </div>
            </div>
            <div class="panel-footer">                
                <a href="{{ route('kitchens.index')}}" class="btn green btn-outline">
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
<script src="{{ asset('global/plugins/bootbox/bootbox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('pages/scripts/ui-bootbox.min.js') }}" type="text/javascript"></script>
@endsection