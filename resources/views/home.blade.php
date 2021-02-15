@extends('layout')
@extends('siderbar')
@section('content')
@if(Auth::check())
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
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
                                    <div class="portlet-body">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td class="success" style="width:150px;" ><b> Email:<b/></td>
                                                    <td>
                                                        {!!Auth::user()->email!!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="success" style="width:80px;" ><b> Username:<b/></td>
                                                    <td>
                                                        {!!Auth::user()->username!!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="success" style="width:120px;"><b>Cedula de Identidad: </b></td>
                                                    <td>
                                                       {!!Auth::user()->ci!!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="success" style="width:120px;"><b>Nombre: </b></td>
                                                    <td>
                                                       {!!Auth::user()->name!!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="success" style="width:120px;"><b>Ap. Paterno: </b></td>
                                                    <td>
                                                       {!!Auth::user()->first_name!!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="success" style="width:120px;"><b>Ap. Paterno: </b></td>
                                                    <td>
                                                       {!!Auth::user()->last_name!!}
                                                    </td>
                                                </tr>
                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
@endif
@stop