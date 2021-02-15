@extends('layout')
@extends('siderbar')
@section('title')
Ventas
@endsection
@section('head')
<link href="{{asset('pages/css/ajustes.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@include('flash::message')
<div class="portlet-body">
    <div class="table-toolbar">
        <label class="panel-title"><h4>LISTA DE VENTAS</h4></label>
        <div class="pull-right">
            <div class="pull-right">
                <a class="btn yellow btn-outline btn-md" href="{{ route('sales.create') }}">
                    <i class="fa fa-plus-square"></i> Crear
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-10">
            <div class="panel-body">
                <table id="tableSales" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <th width="10px">ID</th>
                            <th>Fecha</th>
                            <th>Empleado</th>
                            <th>Mesa</th>
                            <th>Total</th>
                            <th width="50px">Anular</th>
                            <th width="50px">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $sale)
                        <tr>
                            <td>
                                {{$sale->id}}
                            </td>
                            <td>
                                {{$sale->date_sale}}
                            </td>
                            <td>
                                {{$sale->user->name.' '.$sale->user->first_name.' '.$sale->user->last_name }}
                            </td>
                            <td>
                                {{$sale->number_table}}
                            </td>
                            <td>
                                {{ $sale->total}}
                            </td>     
                            <td>
                                <button data-url="{{ route('sales.destroy',[$sale->id]) }}" class="delet btn red btn-outline btn-xs btn-block">
                                    <i class="fa fa-trash fa-lg"></i>
                                    Eliminar
                                </button>
                            </td>
                            <td>
                                <a href="{{ route('sales.show',[$sale->id]) }}" class="btn green btn-outline btn-xs">
                                <i class="fa fa-eye"></i>
                                Detalle
                                </a>
                            </td>   
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('global/plugins/bootbox/bootbox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('pages/scripts/ui-bootbox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('apps/scripts/sales/index.js') }}" type="text/javascript"></script>
@endsection
