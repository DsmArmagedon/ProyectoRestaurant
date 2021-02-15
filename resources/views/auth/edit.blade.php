@extends('layout')
@extends('siderbar')
@section('title')
Cambiar Password
@endsection
@section('content')
@if($errors->has())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach    
    </ul>
</div>
@endif
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
                    <span class="caption-subject font-green bold uppercase">CAMBIAR CONTRASEÑA</span>
                </div>
            </div>
            <div class="panel-body">
                <form action= "{{ route('users.updatePassword',[$user->id]) }}" method="POST" name="formUser" id="formUser">      
                <!--Primera fila formulario de registro-->
                <div class="row">
                    {!!Form::text('roles',$user->roles[0]->id,['hidden'])!!}
                    {!!Form::text('status',$user->status,['hidden'])!!}
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('ci','CEDULA DE IDENTIDAD')!!}
                            {!!Form::text('ci',$user->ci,['class'=>'form-control','readonly'])!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('name','NOMBRE')!!}
                            {!!Form::text('name',$user->name,['class'=>'form-control','readonly'])!!}
                        </div>
                    </div>
                </div>
                <!--Segunda fila de registro usuario-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('first_name','APELLIDO PATERNO')!!}
                            {!!Form::text('first_name',$user->first_name,['class'=>'form-control','readonly'])!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('last_name','APELLIDO MATERNO')!!}
                            {!!Form::text('last_name',$user->last_name,['class'=>'form-control','readonly'])!!}
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
                            {!!Form::label('conf_password','CONFIRMAR PASSWORD')!!}
                            {!!Form::password('conf_password',['class'=>'form-control validate[required,minSize[6],equals[password]] text-input','placeholder'=>'Repita la Contraseña'])!!}
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
                <a href="{{ route('home')}}" class="btn green btn-outline">
                    <i class="fa fa-close" ></i>
                    Cancelar
                </a>                          
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>

@stop
