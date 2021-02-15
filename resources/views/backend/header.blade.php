<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
                <img src="{{asset('layouts/layout/img/logo.png')}}" alt="logo" class="logo-default" /> </a>
            <span></span>
            <div class="menu-toggler sidebar-toggler">
                <br>
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->

        <div class="top-menu">
            <div class="nav navbar-nav">
                 <ul class="nav navbar-nav">
                    <span class="photo">
                        <h2><img src="{{ asset('images/users/sinImagen.png') }}" width="25" height="25" class="img-circle" alt=""></h2>
                    </span>
                 </ul>
                <ul class="nav navbar-nav">
                    
                    <h3> <span class="badge badge-success">{!!Auth::user()->name .' '.Auth::user()->first_name.' '.Auth::user()->last_name!!}</span></h3>

                </ul>
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile">Usuario</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{route('home')}}">
                                    <i class="icon-user"></i> Mi Perfil </a>
                            </li>
                            <li>
                                <a href="{{route('users.editPassword',[Auth::user()->id])}}">
                                    <i class="icon-user"></i> Cambiar Password </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href= '{{route('logout')}}'>
                                    <i class="icon-key"></i> Desconectar </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
@section('scripts')
<script src="{{ asset('apps/scripts/users/edit.js') }}" type="text/javascript"></script>
@endsection
