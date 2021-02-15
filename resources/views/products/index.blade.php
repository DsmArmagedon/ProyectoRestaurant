@extends('layout')
@extends('siderbar')
@section('title')
Productos
@endsection
@section('content')
@include('flash::message')
<div class="portlet-body">
    <div class="table-toolbar">
        <label class="panel-title"><h4>Productos</h4></label>
        <div class="pull-right">
            <div class="pull-right">
                <a class="btn yellow btn-outline btn-md" href="{{ route('products.create') }}">
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
                <table id="tableProducts" class="table table-striped table-bordered display">
                    <thead>
                    <tr>
                        <th width="10px">ID</th>
                        <th>Nombre</th>
                        <th>Existencia</th>
                        <th>Unidad de Medida</th>
                        <th width="50px">Estado</th>
                        <th width="50px">Editar</th>
                        <th width="50px">Ver</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                            {{ $product->id }}
                        </td>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            {{ $product->existence }}
                        </td>
                        <td>
                            {{ $product->unit}}
                        </td>
                        <td align="center">
                            @if($product->status == 1)
                            <a class="btn btn-success btn-xs" href="{{ route('products.status',[$product->id]) }}">
                                <i class="fa fa-check"></i>
                            </a>
                            @else
                            <a class="btn btn-danger btn-xs" href="{{ route('products.status',[$product->id]) }}">
                                <i class="fa fa-remove"></i>
                            </a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.edit',[$product->id]) }}"
                               class="btn blue btn-outline btn-xs btn-block">
                                <i class="fa fa-pencil fa-lg"></i>
                                Editar
                            </a>
                        </td>
                        <td>
                            <button class="show btn green btn-outline btn-xs btn-block" data-id="{{$product->id}}"
                                    data-url="{{ route('products.get-product',[$product->id]) }}">
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

<div class="modal fade" id='modalProduct' tabindex='-1' role='dialog' aria-labellebdy='myModalLabel'>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="text-center"><b>PRODUCTO</b></h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label clas="form-control">NOMBRE</lasbel>
                                <input type="text" id="name" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label clas="form-control">UNIDAD</lasbel>
                                <input type="text" id="unit" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label clas="form-control">EXISTENCIA</lasbel>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="existence" readonly/>
                                    <span class="input-group-btn">
                                                                    <a href="{{ route('purchases.create') }}"
                                                                       class="btn blue btn-outline btn-block">
                                                                        <i class="glyphicon glyphicon-plus"></i>
                                                                             Agregar
                                                                        </a>
                                                                </span>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label clas="form-control">ESTADO</lasbel>
                                <input type="text" id="status" class="form-control" readonly/>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <div class="form-group space">
                                    <img class="thumbnail" style="width: 220px;height:190px " id="imagenProducto"/>
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
</div>

    @endsection

    @section('scripts')
    <script src="{{ asset('apps/scripts/products/index.js') }}" type="text/javascript"></script>
    <script src="{{ asset('apps/scripts/products/show.js') }}" type="text/javascript"></script>
    @endsection
