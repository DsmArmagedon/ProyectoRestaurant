@extends('auth.layoutAuth')
@section('content')
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->

    {!!Form::open(['route'=>'login','method'=>'POST','role'=>'form','class'=>'login-form'])!!}
    <h3 class="form-title">INICIO DE SESION</h3>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span> Error de Logueo</span>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Usuario</label>
        <div class="input-icon">
            <i class="fa fa-user"></i>
            {!!Form::text('username',null,['class'=>'form-control placeholder-no-fix','placeholder'=>'Username','autocomplete'=>'off'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            {!!Form::password('password',['class'=>'form-control placeholder-no-fix','autocomplete'=>'off','placeholder'=>'Password'])!!}
        </div>
    </div>
    <div class="form-actions">
        {!!Form::submit('Ingresar',['class'=>'btn green pull-right'])!!}
    </div>
    <div class="forget-password">
        <h4> <a href="javascript:;" id="forget-password"> Olvidaste tu Contraseña? </a> </h4>
    </div>
</form>
<!--            {!!Form::close()!!}-->

<!--</form>-->
<!-- END LOGIN FORM -->
<!-- BEGIN FORGOT PASSWORD FORM -->
<form class="forget-form" action="" method="post">
    <h3>Recupera tu Contraseña ?</h3>
    <p> Introduce la dirección de correo: </p>
    <div class="form-group">
        <div class="input-icon">
            <i class="fa fa-envelope"></i>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
    </div>
    <div class="form-actions">
        <button type="button" id="back-btn" class="btn red btn-outline">Back </button>
        <button type="submit" class="btn green pull-right"> Submit </button>
    </div>
</form>
<!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
@stop
