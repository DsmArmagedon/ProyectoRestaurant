<?php

use App\Managers\BaseManager;
?>

@extends('layout')
@extends('siderbar')
@section('title')
Crear Usuario
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
                    <i class=" fa fa-user font-green"></i>
                    <span class="caption-subject font-green bold uppercase">EDITAR USUARIO</span>
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
                <form action= "{{ route('users.update',[$user->id]) }}" method="POST" name="formUser" id="formUser" role='form'>
                    {!!Form::text('username',$user->username,['hidden'])!!}
                <!--Primera fila formulario de registro-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('ci','CEDULA DE IDENTIDAD')!!}
                            {!!Form::text('ci',$user->ci,['class'=>'form-control validate[required,maxSize[9],custom[onlyNumberSp]]'])!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('name','NOMBRE')!!}
                            {!!Form::text('name',$user->name,['class'=>'form-control validate[required,custom[onlyLetterSp]] text-input'])!!}
                        </div>
                    </div>
                </div>
                <!--Segunda fila de registro usuario-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('first_name','APELLIDO PATERNO')!!}
                            {!!Form::text('first_name',$user->first_name,['class'=>'form-control validate[required,custom[onlyLetterSp]] text-input'])!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('last_name','APELLIDO MATERNO')!!}
                            {!!Form::text('last_name',$user->last_name,['class'=>'form-control validate[required,custom[onlyLetterSp]] text-input'])!!}
                        </div>
                    </div>
                </div>    
                <div class="form-group">
                    {!!Form::label('email','CORREO ELECTRONICO')!!}
                    {!!Form::text('email',$user->email,['class'=>'form-control validate[required,custom[email]] text-input','value'=>'old(email)'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('rol','ROL')!!}
                    <select name="roles" class="form-control select2">
                        @foreach($roles as $role)
                        <?php
                        $selected = '';
                        foreach ($user->roles as $value) {
                            if ($value->id == $role->id) {
                                $selected = 'selected="selected"';
                            }
                        }
                        ?>
                        <option value="{{ $role->id }}" <?= $selected; ?> >
                            {{  $role->display_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('password','PASSWORD')!!}
                            {!!Form::password('password',['class'=>'form-control validate[required,minSize[6]] text-input','placeholder'=>'Contraseña'])!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('checkPassword','CONFIRMAR PASSWORD')!!}
                            {!!Form::password('checkPassword',['class'=>'form-control validate[required,minSize[6],equals[password]] text-input','placeholder'=>'Repita la Contraseña'])!!}
                        </div>
                    </div>
                </div>
                <div class="form-group space">                                
                    <label for="status" class="control-label">ESTADO:</label>
                    <div>
                        <div style="display: inline-block">
                            <input type="radio" name="status" value="1" <?= $user->status == BaseManager::ENABLED ? 'checked' : '' ?> /> 
                            <label >Habilitado</label>
                        </div>
                        <div style="display: inline-block">
                            <input type="radio" name="status" value="0" <?= $user->status == BaseManager::DISABLED ? 'checked' : '' ?> />
                            <label >Deshabilitado</label>
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
                <a href="{{ route('users.index')}}" class="btn green btn-outline">
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
<script src="{{ asset('apps/scripts/users/edit.js') }}" type="text/javascript"></script>
@endsection