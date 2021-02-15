@extends('layout')
@extends('siderbar')
@section('title')
Crear Producto
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
                    <h3><i class=" icon-basket font-green"></i>
                        <span class="caption-subject font-green bold uppercase">PRODUCTO</span></h3>
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
                <form action="{{route('products.store')}}" method="POST" id="formProduct" enctype="multipart/form-data">
                    <div class="form-group">
                        <label name="name">NOMBRE PRODUCTO</label>
                        <input name="name" type="text" class="form-control validate[required,custom[onlyLetterSp]]" placeholder="Nombre del Producto">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label name="unit">UNIDAD DE MEDIDA</label>
                                <input name="unit" type="text" class="form-control validate[required,custom[onlyLetterSp]]" placeholder="Unidad de Control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="control-label">ESTADO</label>
                            <div class="row">
                                <input type="radio" name="status" value="1" checked/> 
                                <label >HABILITADO</label>
                            </div>
                            <div class="row">
                                <input type="radio" name="status" value="0" />
                                <label >DESHABILITADO</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image" class="control-label">IMAGEN</label>
                            </div>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                                <div>
                                    <span class="btn red btn-outline btn-file">
                                        <span class="fileinput-new"> Seleccionar Imagen </span>
                                        <span class="fileinput-exists"> Cambiar </span>
                                        <input type="file" name="image" id="image"> </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Borrar </a>
                                </div>
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
                <a href="{{ route('products.index')}}" class="btn green btn-outline">
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
<script src="{{ asset('apps/scripts/products/create.js') }}" type="text/javascript"></script>
@endsection