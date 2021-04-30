@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
    <div class="controls-send">
        <button class="button-soft button-soft-secondary"
                onclick="window.location.replace('categories/{{'register'}}')">
            <span>Registrar</span>
            <i class="fa fa-plus"></i>
        </button>
    </div>
    <table class="table table-pagination">
        <thead>
        <tr>
            <th scope="col">Opciones</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td class="controls-table">
                    <button onclick="window.location.replace('categories/{{$category->category_id}}')"
                            class="button-soft button-soft-primary" data-toggle="tooltip"
                            data-placement="left"
                            title="Editar"><i class="fa fa-edit"></i>
                    </button>
                    <button onclick="window.location.replace('categories/status/{{$category->category_id}}')"
                            class="button-soft {{($category->category_active==1)?'button-soft-secondary':'button-soft-success'}}"
                            data-toggle="tooltip"
                            data-placement="bottom"
                            title="{{($category->category_active==1)?'Desactivar':'Activar'}}"><i
                            class="fa {{($category->category_active==1)?'fa-times':'fa-check'}}"></i>
                    </button>
                    <form id="delete{{$category->category_id}}" method="POST"
                          action="{{route('categories_delete',$category->category_id)}}">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button onclick="deleteConfirm('{{$category->category_id}}')"
                            class="button-soft button-soft-error" data-toggle="tooltip" data-placement="right"
                            title="Eliminar"><i class="fa fa-trash-alt"></i></button>
                </td>
                <td>{{$category->category_name}}</td>
                <td>
                    <button class="button-soft button-soft-secondary"
                            onclick="category_image('{{$category->category_id}}')">
                        <span>Mostrar</span>
                        <i class="fa fa-image"></i>
                    </button>
                </td>
                <td>{{($category->category_active==1)?'Activo':'Inactivo'}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('navigation')
    <div class="navigation">
        <a class="link-navigation" id="categories" href="{{route('categories')}}">Categorías</a>
    </div>
@stop

@section('modal')
    <!-- Modal register-->
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="exampleModalLabel"><i class="fa fa-map-signs"></i> @if(session('id_to_update'))Editar @else Registrar @endif categoría</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <form id="register_form" action="@if(session('id_to_update')){{route('categories_update',session('id_to_update'))}}@else{{route('categories')}}@endif" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @if(session('id_to_update'))
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" class="form-control input-border" name="category_name"
                                           placeholder="Digite el nombre" maxlength="30"
                                           value="@if(session('data')){{session('data')->category_name}}@endif{{ old('category_name') }}"
                                           @if ($errors->has('category_name')) autofocus @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="mb-3 input-soft">
                                    <label
                                        class="form-label">Imagen principal
                                        <span class="fs-13">[Dimensión: 128px * 128px]</span>
                                    </label>
                                    <label for="image_upload" class="input-file">
                                        <span id="label_upload">Subir imagen principal</span>
                                        <i class="fa fa-upload"></i>
                                    </label>
                                    <input type="file" id="image_upload" class="form-control input-border" name="file_image" accept="image/png">
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

