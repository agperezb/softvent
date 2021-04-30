@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <div class="controls-send">
        <button class="button-soft button-soft-secondary"
                onclick="window.location.replace('products/{{'register'}}')">
            <span>Registrar</span>
            <i class="fa fa-plus"></i>
        </button>
    </div>
    <table class="table table-pagination">
        <thead>
        <tr>
            <th scope="col">Opciones</th>
            <th scope="col">Nombre</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">description</th>
            <th scope="col">Imagen</th>
            <th scope="col">Categoría</th>
            <th scope="col">Provedor</th>
            <th scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td class="controls-table">
                    <button onclick="window.location.replace('products/{{$product->product_id}}')"
                            class="button-soft button-soft-primary" data-toggle="tooltip"
                            data-placement="left"
                            title="Editar"><i class="fa fa-edit"></i>
                    </button>
                    <button onclick="window.location.replace('products/status/{{$product->product_id}}')"
                            class="button-soft {{($product->product_active==1)?'button-soft-secondary':'button-soft-success'}}"
                            data-toggle="tooltip"
                            data-placement="bottom"
                            title="{{($product->product_active==1)?'Desactivar':'Activar'}}"><i
                            class="fa {{($product->product_active==1)?'fa-times':'fa-check'}}"></i>
                    </button>
                    <form id="delete{{$product->product_id}}" method="POST"
                          action="{{route('products_delete',$product->product_id)}}">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button onclick="deleteConfirm('{{$product->product_id}}')"
                            class="button-soft button-soft-error" data-toggle="tooltip" data-placement="right"
                            title="Eliminar"><i class="fa fa-trash-alt"></i></button>
                </td>
                <td>{{$product->product_name}}</td>
                <td>
                    <button class="button-soft button-soft-secondary"
                            onclick="product_image('{{$product->product_id}}')">
                        <span>Mostrar</span>
                        <i class="fa fa-image"></i>
                    </button>
                </td>
                <td>{{($product->product_active==1)?'Activo':'Inactivo'}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('navigation')
    <div class="navigation">
        <a class="link-navigation" id="products" href="{{route('products')}}">Productos</a>
    </div>
@stop

@section('modal')
    <!-- Modal register-->
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="exampleModalLabel"><i class="fa fa-map-signs"></i>@if(session('id_to_update')) Editar @else Registrar @endif producto</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <form id="register_form" action="@if(session('id_to_update')){{route('products_update',session('id_to_update'))}}@else{{route('products')}}@endif" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @if(session('id_to_update'))
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" class="form-control input-border" name="product_name"
                                           placeholder="Digite el nombre" maxlength="30"
                                           value="@if(session('data')){{session('data')->product_name}}@endif{{ old('product_name') }}"
                                           @if ($errors->has('product_name')) autofocus @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Cantidad</label>
                                    <input type="text" class="form-control input-border" name="product_stock"
                                           placeholder="Digite la cantidad" maxlength="30"
                                           value="@if(session('data')){{session('data')->product_stock}}@endif{{ old('product_stock') }}"
                                           @if ($errors->has('product_stock')) autofocus @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Precio</label>
                                    <input type="text" class="form-control input-border" name="product_value"
                                           placeholder="Digite el precio" maxlength="30"
                                           value="@if(session('data')){{session('data')->product_value}}@endif{{ old('product_value') }}"
                                           @if ($errors->has('product_value')) autofocus @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Categoría</label>
                                    <select id="category" type="text" class="form-control input-border select-single"
                                            name="category_id"
                                            @if ($errors->has('category_id')) autofocus @endif>
                                        <option></option>
                                        @foreach($categories as $category)
                                            <option
                                                @if(session('data')){{(session('data')->category_id == $category->category_id)?'selected':''}}
                                                @endif
                                                @if(old('category_id')){{(old('category_id') == $category->category_id)?'selected':''}}@endif
                                                value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Provedores</label>
                                    <select id="provider" type="text" class="form-control input-border select-single"
                                            name="provider_id"
                                            @if ($errors->has('provider_id')) autofocus @endif>
                                        <option></option>
                                        @foreach($providers as $provider)
                                            <option
                                                @if(session('data')){{(session('data')->provider_id == $provider->provider_id)?'selected':''}}
                                                @endif
                                                @if(old('provider_id')){{(old('provider_id') == $provider->provider_id)?'selected':''}}@endif
                                                value="{{$provider->provider_id}}">{{$provider->provider_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="mb-3 input-soft">
                                    <label class="form-label">Descripción</label>
                                    <textarea cols="3" type="text" class="form-control input-border"
                                              name="product_description" maxlength="200"
                                              placeholder="Digite la descripción"
                                              @if ($errors->has('product_description')) autofocus @endif>@if(session('data')){{session('data')->product_description}}@endif{{ old('product_description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="mb-3 input-soft">
                                    <label
                                        class="form-label">Imagen principal
                                        <span class="fs-13">[Dimensión: 800px * 800px]</span>
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
