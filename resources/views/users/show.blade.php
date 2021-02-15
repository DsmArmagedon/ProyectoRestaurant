@extends('layout')
@extends('siderbar')
@section('title')
Editar Usuario
@endsection
@section('content')
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
                    <span class="caption-subject font-green bold uppercase">DETALLE DE USUARIO</span>
                </div>
            </div>
            <div class="panel-body">
                <!--Primera fila formulario de registro-->
                <div class="row">
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
                <div class="form-group">
                    {!!Form::label('email','CORREO ELECTRONICO')!!}
                    {!!Form::text('email',$user->email,['class'=>'form-control','value'=>'old(email)','readonly'])!!}
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('username','USUARIO')!!}
                            {!!Form::text('username',$user->username,['class'=>'form-control','readonly'])!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('rol','ROL')!!}
                                @foreach($user->roles as $rol)
                                    {!!Form::text('rol',$rol->display_name,['class'=>'form-control','readonly'])!!}
                                @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="control-label">ESTADO</label>
                    @if($user->status = 1)
                        {!!Form::text('status','Habilitado',['class'=>'form-control','readonly'])!!}
                    @else
                        {!!Form::text('status','Deshabilitado',['class'=>'form-control','readonly'])!!}
                    @endif
                </div>
            </div>
            <div class="panel-footer">                
                <a href="{{ route('users.index')}}" class="btn green btn-outline">
                    <i class="fa fa-arrow-left" ></i>
                    Atras
                </a>                             
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>

@stop