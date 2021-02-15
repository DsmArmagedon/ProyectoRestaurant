@extends('layout')
@extends('siderbar')
@section('title')
Cocina
@endsection
@section('head')
<link href="{{asset('pages/css/ajustes.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@include('flash::message')
<div class="portlet-body">
    <div class="table-toolbar">
        <label class="panel-title"><h4>LISTA DE PLATOS ELABORADOS</h4></label>
        <div class="pull-right">
            <div class="pull-right">
                <a class="btn yellow btn-outline btn-md" href="{{ route('kitchens.create') }}">
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
                <table id="tableKitchens" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <th width="10px">ID</th>
                            <th>Fecha</th>
                            <th>Plato</th>
                            <th>Empleado</th>
                            <th>Cantidad</th>
                            <th width="50px">Anular</th>
                            <th width="50px">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kitchens as $kitchen)
                        <tr>
                            <td>
                                {{$kitchen->id}}
                            </td>
                            <td>
                                {{ $kitchen->date_kitchen}}
                            </td>
                            <td>
                                {{ $kitchen->plate->name }}
                            </td>
                            <td>
                                {{ $kitchen->user->name .' '.$kitchen->user->first_name.' '.$kitchen->user->last_name}}
                            </td>
                            <td>
                                {{ $kitchen->existence_plate}}
                            </td>     
                            <td>
                                <button data-url="{{ route('kitchens.destroy',[$kitchen->id]) }}" class="delet btn red btn-outline btn-xs btn-block">
                                    <i class="fa fa-trash fa-lg"></i>
                                    Eliminar
                                </button>
                            </td>
                            <td>
                                <a href="{{ route('kitchens.show',[$kitchen->id]) }}" class="btn green btn-outline btn-xs">
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
<script src="{{ asset('apps/scripts/kitchens/index.js') }}" type="text/javascript"></script>
@endsection
