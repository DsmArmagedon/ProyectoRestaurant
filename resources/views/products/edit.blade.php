<?php

use App\Managers\BaseManager;
?>

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
                    <i class=" icon-basket font-green"></i>
                    <span class="caption-subject font-green bold uppercase">PRODUCTO</span>
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
                <form action="{{route('products.update',[$product->id])}}" method="POST" id="formProduct" enctype="multipart/form-data">
                    <div class="form-group">
                        <label name="name">NOMBRE PRODUCTO</label>
                        <input name="name" type="text" class="form-control validate[required,custom[onlyLetterSp]]" value="{{$product->name}}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label name="unit">UNIDAD DE MEDIDA</label>
                                <input name="unit" type="text" class="form-control validate[required,custom[onlyLetterSp]]" value="{{$product->unit}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="control-label">ESTADO</label>
                            <div class="row">
                                <input type="radio" name="status" value="1" <?= $product->status == BaseManager::ENABLED ? 'checked' : '' ?> /> 
                                <label >HABILITADO</label>
                            </div>
                            <div class="row">
                                <input type="radio" name="status" value="0" <?= $product->status == BaseManager::DISABLED ? 'checked' : '' ?> />
                                <label >DESHABILITADO</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                                <label for="image" class="control-label">IMAGEN</label>
                            </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group space">
                                <img class="thumbnail" alt="{{ $product->name}}" style="width: 220px;height:190px " src="{{ asset('images/products/' . $product->id . '.' . $product->extension)}}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
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
                        {{ method_field('PUT') }}
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
<script src="{{ asset('apps/scripts/products/edit.js') }}" type="text/javascript"></script>
@endsection