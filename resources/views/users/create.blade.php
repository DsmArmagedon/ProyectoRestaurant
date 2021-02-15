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
                    <span class="caption-subject font-green bold uppercase">USUARIO</span>
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
                {!!Form::open(['route'=>'users.store','method'=>'POST','id'=>'formUser'])!!}
                <!--Primera fila formulario de registro-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('ci','CEDULA DE IDENTIDAD')!!}
                            {!!Form::text('ci',null,['class'=>'form-control validate[required,maxSize[9],custom[onlyNumberSp]]','placeholder'=>'Cedula de Identidad'])!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('name','NOMBRE')!!}
                            {!!Form::text('name',null,['class'=>'form-control validate[required,custom[onlyLetterSp]] text-input','placeholder'=>'Nombre'])!!}
                        </div>
                    </div>
                </div>
                <!--Segunda fila de registro usuario-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('first_name','APELLIDO PATERNO')!!}
                            {!!Form::text('first_name',null,['class'=>'form-control validate[required,custom[onlyLetterSp]] text-input','placeholder'=>'Apellido Paterno'])!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('last_name','APELLIDO MATERNO')!!}
                            {!!Form::text('last_name',null,['class'=>'form-control validate[required,custom[onlyLetterSp]] text-input','placeholder'=>'Apellido Materno'])!!}
                        </div>
                    </div>
                </div>    
                <div class="form-group">
                    {!!Form::label('email','CORREO ELECTRONICO')!!}
                    {!!Form::text('email',null,['class'=>'form-control validate[required,custom[email]] text-input','value'=>'old(email)','placeholder'=>'Correo Electronico'])!!}
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('username','USUARIO')!!}
                            {!!Form::text('username',null,['class'=>'form-control validate[required,minSize[6]] text-input','placeholder'=>'Nombre de Usuario'])!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('rol','ROL')!!}
                            <select name="roles" class="form-control select2">
                                @foreach($roles as $rol)
                                <option value="{{$rol->id}}">{!!$rol->display_name!!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
                <div class="form-group">                                
                    <label for="status" class="control-label">ESTADO</label>
                    <div>
                        <div style="display: inline-block">
                            <input type="radio" name="status" value="1" checked/> 
                            <label >Habilitado</label>
                        </div>
                        <div style="display: inline-block">
                            <input type="radio" name="status" value="0"/>
                            <label >Deshabilitado</label>
                        </div>
                    </div>
                </div>

                {!!Form::close()!!}
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
<script src="{{ asset('apps/scripts/users/create.js') }}" type="text/javascript"></script>
@endsection