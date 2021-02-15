@extends('layout')
@extends('siderbar')
@section('title')
Compras
@endsection
@section('head')
<link href="{{asset('pages/css/ajustes.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@include('flash::message')
<div class="portlet-body">
    <div class="table-toolbar">
        <label class="panel-title"><h4>Compras</h4></label>
        <div class="pull-right">
            <div class="pull-right">
                <a class="btn yellow btn-outline btn-md" href="{{ route('purchases.create') }}">
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
                <table id="tablePurchases" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <th width="10px">ID</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Cantidad</th>
                            <th width="50px">Estado</th>
                            <th width="50px">Editar</th>
                            <th width="50px">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchases as $purchase)
                        <tr>
                            <td>
                                {{ $purchase->id }}
                            </td>
                            <td>
                                {{ $purchase->product->name}}
                            </td>
                            <td>
                                {{ $purchase->date_purchase}}
                            </td>
                            <td>
                                {{ $purchase->quantity}}
                            </td>     
                            <td align="center">
                                @if($purchase->status == 1)
                                <a class="btn btn-success btn-xs" href="{{ route('purchases.status',[$purchase->id]) }}">
                                    <i class="fa fa-check"></i>
                                </a>
                                @else
                                <a class="btn btn-danger btn-xs" href="{{ route('purchases.status',[$purchase->id]) }}">
                                    <i class="fa fa-remove"></i>
                                </a>                        
                                @endif                        
                            </td>
                            <td>
                                <button data-url="{{ route('purchases.destroy',[$purchase->id]) }}" class="delet btn red btn-outline btn-xs btn-block">
                                    <i class="fa fa-trash fa-lg"></i>
                                    Eliminar
                                </button>
                            </td>
                            <td>
                                <button class="show btn green btn-outline btn-xs btn-block" data-url="{{ route('purchases.get-purchase',[$purchase->id]) }}" data-id="{{$purchase->id}}" >
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
    </div>
</div>


<div class="modal fade" id='modalPurchase' tabindex='-1' role='dialog' aria-labellebdy='myModalLabel'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="text-center"><b>COMPRA</b></h2>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label clas="form-control" >NOMBRE</lasbel>
                                <input type="text" id="name" class="form-control" readonly/> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label clas="form-control" >FECHA</lasbel>
                                <input type="text" id="date_purchase" class="form-control" readonly/> 
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label clas="form-control" >CANTIDAD COMPRADA</lasbel>
                                <input type="text" id="quantity" class="form-control" readonly/> 
                        </div>
                        <div class="form-group">
                            <label clas="form-control" >EXISTENCIAS</lasbel>
                                <input type="text" id="existence" class="form-control" readonly/> 
                        </div>
                        <div class="form-group">
                            <label clas="form-control" >UNIDAD</lasbel>
                                <input type="text" id="unit" class="form-control" readonly/> 
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
                            <textarea name="description" id="description" class="form-control" rows="3" id="comment" readonly></textarea>
                        </div>
                    </div>

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
<script src="{{ asset('global/plugins/bootbox/bootbox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('pages/scripts/ui-bootbox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('apps/scripts/purchases/index.js') }}" type="text/javascript"></script>
<script src="{{ asset('apps/scripts/purchases/show.js') }}" type="text/javascript"></script>
@endsection
