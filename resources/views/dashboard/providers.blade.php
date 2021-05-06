@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
    <div class="controls-send">
        <button class="button-soft button-soft-secondary"
                onclick="window.location.replace('providers/{{'register'}}')">
            <span>Registrar</span>
            <i class="fa fa-plus"></i>
        </button>
    </div>
    <table class="table table-pagination">
        <thead>
        <tr>
            <th scope="col">Opciones</th>
            <th scope="col">Nombre</th>
            <th scope="col">Nit</th>
            <th scope="col">Dirección</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($providers as $provider)
            <tr>
                <td class="controls-table">
                    <button onclick="window.location.replace('providers/{{$provider->provider_id}}')"
                            class="button-soft button-soft-primary" data-toggle="tooltip"
                            data-placement="left"
                            title="Editar"><i class="fa fa-edit"></i>
                    </button>
                    <button onclick="window.location.replace('providers/status/{{$provider->provider_id}}')"
                            class="button-soft {{($provider->provider_status==1)?'button-soft-secondary':'button-soft-success'}}"
                            data-toggle="tooltip"
                            data-placement="bottom"
                            title="{{($provider->provider_status==1)?'Desactivar':'Activar'}}"><i
                            class="fa {{($provider->provider_status==1)?'fa-times':'fa-check'}}"></i>
                    </button>
                    <form id="delete{{$provider->provider_id}}" method="POST"
                          action="{{route('providers_delete',$provider->provider_id)}}">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button onclick="deleteConfirm('{{$provider->provider_id}}')"
                            class="button-soft button-soft-error" data-toggle="tooltip" data-placement="right"
                            title="Eliminar"><i class="fa fa-trash-alt"></i></button>
                </td>
                <td>{{$provider->provider_name}}</td>
                <td>{{$provider->provider_nit}}</td>
                <td>{{$provider->provider_direction}}</td>
                <td>{{$provider->provider_phone}}</td>
                <td>{{($provider->provider_status==1)?'Activo':'Inactivo'}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('modal')
    <!-- Modal register-->
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="exampleModalLabel"><i class="fa fa-map-signs"></i> @if(session('id_to_update'))Editar @else Registrar @endif proveedor</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <form id="register_form" action="@if(session('id_to_update')){{route('providers_update',session('id_to_update'))}}@else{{route('providers')}}@endif" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @if(session('id_to_update'))
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" class="form-control input-border" name="provider_name"
                                           placeholder="Digite el nombre" maxlength="30"
                                           value="@if(session('data')){{session('data')->provider_name}}@endif{{ old('provider_name') }}"
                                           @if ($errors->has('provider_name')) autofocus @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Nit</label>
                                    <input type="text" class="form-control input-border" name="provider_nit"
                                           placeholder="Digite el nit" maxlength="30"
                                           value="@if(session('data')){{session('data')->provider_nit}}@endif{{ old('provider_nit') }}"
                                           @if ($errors->has('provider_nit')) autofocus @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Dirección</label>
                                    <input type="text" class="form-control input-border" name="provider_direction"
                                           placeholder="Digite la dirección" maxlength="30"
                                           value="@if(session('data')){{session('data')->provider_direction}}@endif{{ old('provider_direction') }}"
                                           @if ($errors->has('provider_direction')) autofocus @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Teléfono</label>
                                    <input type="text" class="form-control input-border" name="provider_phone"
                                           placeholder="Digite el numero de telefono" maxlength="30"
                                           value="@if(session('data')){{session('data')->provider_phone}}@endif{{ old('provider_phone') }}"
                                           @if ($errors->has('provider_phone')) autofocus @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="button-soft button-soft-secondary">
                            <span>Limpiar</span>
                            <i class="fa fa-eraser"></i>
                        </button>
                        <button type="submit" class="button-soft button-soft-primary">
                            <span>Guardar</span>
                            <i class="fa fa-save"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(!$errors->isEmpty() || (session('register')) || session('data'))
        <script>
            $('#register').modal('show')
        </script>
    @endif
@stop
