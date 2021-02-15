@extends('layout')
@extends('siderbar')
@section('title')
Platos
@endsection
@section('content')
@include('flash::message')
<div class="portlet-body">
    <div class="table-toolbar">
        <label class="panel-title"><h4>Platos</h4></label>
        <div class="pull-right">
            <div class="pull-right">
                <a class="btn yellow btn-outline btn-md" href="{{ route('plates.create') }}">
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
                <table id="tablePlates" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <th width="10px">ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Existencia</th>   
                            <th width="50px">Estado</th>
                            <th width="50px">Editar</th>
                            <th width="50px">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plates as $plate)
                        <tr>
                            <td>
                                {{ $plate->id }}
                            </td>
                            <td>
                                {{ $plate->name }}
                            </td>
                            <td>
                                {{ $plate->price }}
                            </td>     
                            <td>
                                {{ $plate->existence}}
                            </td>
                            <td align="center">
                                @if($plate->status == 1)
                                <a class="btn btn-success btn-xs" href="{{ route('plates.status',[$plate->id]) }}">
                                    <i class="fa fa-check"></i>
                                </a>
                                @else
                                <a class="btn btn-danger btn-xs" href="{{ route('plates.status',[$plate->id]) }}">
                                    <i class="fa fa-remove"></i>
                                </a>                        
                                @endif                        
                            </td>
                            <td>
                                <a href="{{ route('plates.edit',[$plate->id]) }}" class="btn blue btn-outline btn-xs btn-block">
                                    <i class="fa fa-pencil fa-lg"></i>
                                    Editar
                                </a>
                            </td>
                            <td>
                                <button class="show btn green btn-outline btn-xs btn-block"  data-id="{{$plate->id}}" data-url="{{ route('plates.get-plate',[$plate->id]) }}">
                                    <i class="fa fa-eye"></i>
                                    Detalle
                                </button>
                            </td>   
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1">

        </div>
    </div>

</div>

<div class="modal fade" id='modalPlate' tabindex='-1' role='dialog' aria-labellebdy='myModalLabel'>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="text-center"><b>PLATO</b></h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label clas="form-control" >NOMBRE</lasbel>
                                <input type="text" id="name" class="form-control" readonly> 
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label clas="form-control" >PRECIO</lasbel>
                                            <input type="text" id="price" class="form-control" readonly> 
                                            </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label clas="form-control" >EXISTENCIA</lasbel>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="existence" readonly>
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-primary" type="button">Agregar</button>
                                                                </span>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label clas="form-control" >ESTADO</lasbel>
                                                            <input type="text" id="status" class="form-control" readonly> 
                                                            </div>
                                                            </div>


                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3"></div>
                                                                <div class="col-md-6">
                                                                    <div class="col-md-6">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group space">
                                                                                <img class="thumbnail" style="width: 220px;height:190px " id="imagenPlate"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3"></div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                            </div>
                                                    </div>

                                                </div>
                                            </div>
                                            @endsection

                                            @section('scripts')
                                            <script src="{{ asset('apps/scripts/plates/index.js') }}" type="text/javascript"></script>
                                            <script src="{{ asset('apps/scripts/plates/show.js') }}" type="text/javascript"></script>
                                            @endsection
