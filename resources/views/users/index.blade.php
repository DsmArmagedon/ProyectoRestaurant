@extends('layout')
@extends('siderbar')
@section('title')
Usuarios
@endsection
@section('content')
@include('flash::message')
<div class="portlet-body">
    <div class="table-toolbar">
        <label class="panel-title"><h4>Usuarios</h4></label>
        <div class="pull-right">
            <div class="pull-right">
                <a class="btn yellow btn-outline btn-md" href="{{ route('users.create') }}">
                    <i class="fa fa-plus-square"></i> Crear
                </a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table id="tableUsers" class="table table-striped table-bordered display">
            <thead>
                <tr>
                    <th width="10px">ID</th>
                    <th width="30px">CI</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>   
                    <th>Email</th> 
                    <th>Rol</th>
                    <th width="50px">Estado</th>
                    <th width="160px">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        {{ $user->id }}
                    </td>
                    <td>
                        {{ $user->ci }}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>     
                    <td>
                        {{ $user->first_name.' '.$user->last_name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        @foreach($user->roles as $role)
                            <li>
                                {{ $role->display_name }}
                            </li>
                        @endforeach
                    </td>
                    <td align="center">
                        @if($user->status == 1)
                        <a class="btn btn-success btn-xs" href="{{ route('users.status',[$user->id]) }}">
                            <i class="fa fa-check"></i>
                            </a>
                        @else
                        <a class="btn btn-danger btn-xs" href="{{ route('users.status',[$user->id]) }}">
                            <i class="fa fa-remove"></i>
                        </a>                        
                        @endif                        
                    </td>
                    <td>
                        <a href="{{ route('users.edit',[$user->id]) }}" class="btn blue btn-outline btn-xs">
                            <i class="fa fa-pencil fa-lg"></i>
                            Editar
                        </a>
                        <a href="{{ route('users.show',[$user->id]) }}" class="btn green btn-outline btn-xs">
                            <i class="fa fa-eye"></i>
                            Detalle
                        </a>
                    </td>    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('apps/scripts/users/index.js') }}" type="text/javascript"></script>
@endsection
