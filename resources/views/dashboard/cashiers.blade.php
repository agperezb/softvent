@extends('layouts.app')

@section('title', 'Cajeros')

@section('content')
    <div class="controls-send">
        <button class="button-soft button-soft-secondary"
                onclick="window.location.replace('cashiers/{{'register'}}')">
            <span>Registrar</span>
            <i class="fa fa-plus"></i>
        </button>
    </div>
    <table class="table table-pagination">
        <thead>
        <tr>
            <th scope="col">Opciones</th>
            <th scope="col">Comercio</th>
            <th scope="col">Email</th>
            <th scope="col">Nombre</th>
            <th scope="col">Documento</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Fecha de nacimiento</th>
            <th scope="col">Descripción</th>
            <th scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td class="controls-table">
                    <button onclick="window.location.replace('cashiers/{{$user->id}}')"
                            class="button-soft button-soft-primary" data-toggle="tooltip"
                            data-placement="left"
                            title="Editar"><i class="fa fa-edit"></i>
                    </button>
                    <button onclick="window.location.replace('cashiers/status/{{$user->id}}')"
                            class="button-soft {{($user->user_status==1)?'button-soft-secondary':'button-soft-success'}}"
                            data-toggle="tooltip"
                            data-placement="bottom"
                            title="{{($user->user_status==1)?'Desactivar':'Activar'}}"><i
                            class="fa {{($user->user_status==1)?'fa-times':'fa-check'}}"></i>
                    </button>
                </td>
                <td>{{$user->commerce_name}}
                <td>{{$user->email}}</td>
                <td>{{$user->person_name}}</td>
                <td>{{$user->document_type_name}} {{$user->person_document}}</td>
                <td>{{$user->person_phone}}</td>
                <td>{{$user->person_birthdate}}</td>
                <td>{{$user->commerce_description}}</td>
                <td>{{($user->user_status==1)?'Activo':'Inactivo'}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('navigation')
    <div class="navigation">
        <a class="link-navigation" id="cashiers" href="{{route('cashiers')}}">Cajeros</a>
    </div>
@stop

@section('modal')
    <!-- Modal register-->
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="exampleModalLabel"><i class="fa fa-map-signs"></i>@if(session('id_to_update')) Editar @else Registrar @endif cajero</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <form id="register_form" action="@if(session('id_to_update')){{route('cashiers_update',session('id_to_update'))}}@else{{route('cashiers')}}@endif" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @if(session('id_to_update'))
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" class="form-control input-border" name="person_name"
                                           placeholder="Digite el nombre de la persona" maxlength="30"
                                           value="@if(session('data')){{session('data')->person->person_name}}@endif{{ old('person_name') }}"
                                           @if ($errors->has('person_name')) autofocus @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Apellido</label>
                                    <input type="text" class="form-control input-border" name="person_last_name"
                                           placeholder="Digite el nombre de la persona" maxlength="30"
                                           value="@if(session('data')){{session('data')->person->person_last_name}}@endif{{ old('person_last_name') }}"
                                           @if ($errors->has('person_last_name')) autofocus @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Tipo de documento</label>
                                    <select id="category" type="text" class="form-control input-border select-single"
                                            name="document_type_id"
                                            @if ($errors->has('category_id')) autofocus @endif>
                                        <option></option>
                                        @foreach($document_types as $document_type)
                                            <option
                                                @if(session('data')){{(session('data')->person->document_type_id == $document_type->document_type_id)?'selected':''}}
                                                @endif
                                                @if(old('document_type_id')){{(old('document_type_id') == $document_type->document_type_id)?'selected':''}}@endif
                                                value="{{$document_type->document_type_id}}">{{$document_type->document_type_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Numero de documento</label>
                                    <input type="text" class="form-control input-border" name="person_document"
                                           placeholder="Digite el numero de documento" maxlength="30"
                                           value="@if(session('data')){{session('data')->person->person_document}}@endif{{ old('person_document') }}"
                                           @if ($errors->has('person_document')) autofocus @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Teléfono</label>
                                    <input type="text" class="form-control input-border" name="person_phone"
                                           placeholder="Digite el teléfono" maxlength="30"
                                           value="@if(session('data')){{session('data')->person->person_phone}}@endif{{ old('person_phone') }}"
                                           @if ($errors->has('person_phone')) autofocus @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="mb-3 input-soft">
                                    <label class="form-label ">Fecha de nacimiento</label>
                                    <input type="date" class="form-control input-border" name="person_birthdate"
                                           placeholder="Seleccione su fecha de nacimiento"
                                           value="@if(session('data')){{session('data')->person->person_birthdate}}@endif{{ old('person_birthdate') }}"
                                           @if ($errors->has('person_birthdate')) autofocus @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="mb-3 input-soft">
                                    <label class="form-label ">Correo</label>
                                    <input type="text" class="form-control input-border" name="email"
                                           placeholder="Digite su correo"
                                           value="@if(session('data')){{session('data')->email}}@endif{{ old('email') }}"
                                           @if ($errors->has('email')) autofocus @endif>
                                </div>
                            </div>
                            @if(!session('id_to_update'))
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="mb-3 input-soft">
                                        <label class="form-label ">Contraseña</label>
                                        <input type="password" class="form-control input-border" name="password"
                                               placeholder="Digite la contraseña"
                                               @if ($errors->has('password')) autofocus
                                               @endif autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="mb-3 input-soft">
                                        <label class="form-label ">Confirmar contraseña</label>
                                        <input type="password" class="form-control input-border"
                                               name="password_confirmation"
                                               placeholder="Confirme la contraseña"
                                               @if ($errors->has('password_confirmation')) autofocus @endif>
                                    </div>
                                </div>
                            @endif
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
