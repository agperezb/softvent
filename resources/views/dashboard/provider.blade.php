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
            <th scope="col">Título</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Usuario</th>
            <th scope="col">Enviado a</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>vvv</td>
                <td>bbbb</td>
                <td>ghghgh</td>
                <td>gfhgh</td>
            </tr>
        </tbody>
    </table>
@stop
