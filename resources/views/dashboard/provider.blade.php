@extends('layouts.app')

@section('title', 'Provider')

@section('content')
    <div class="controls-send">
        <button class="button-soft button-soft-secondary"
                onclick="window.location.replace('products/{{'clear'}}')">
            <span>Registrar</span>
            <i class="fa fa-plus"></i>
        </button>
    </div>
    <table class="table table-pagination">
        <thead>
        <tr>
            <th scope="col">Opciones</th>
            <th scope="col">Título</th>
            <th scope="col">Descripción</th>
            <th scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                aa
            </td>
            <td>fvgfv</td>
            <td>vbxvb</td>
            <td>vbvbv</td>
        </tr>
        </tbody>
    </table>
@stop
