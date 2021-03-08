@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <header>
        <nav class="menu-navigation">
            <div class="menu-logo">
                <img src="" alt="">
            </div>
            <div class="menu-items">
                <li><a href="#" class="menu_items_list">Inicio</a></li>
                <li><a href="#caracteristicas" class="menu_items_list">Características</a></li>
                <li><a href="#ventajas" class="menu_items_list">Ventajas</a></li>
                <li><a href="#planes" class="menu_items_list">Planes</a></li>
                <li><a href="#contacto" class="menu_items_list">Contacto</a></li>
                <li><a href=""class="menu_items_botton">INGRESAR</a></li>
                <li><a href=""class="menu_items_bottom-bold">CREAR CUENTA</a></li>
            </div>
        </nav>
        <section class="hero">
            <div class="hero-textos">
                <h1>Software de Ventas <span>SOFTVENT</span> para Pymes</h1>
                <p>Fácil de adquirir y usar, con un equipo de soporte listo cuando lo necesite!</p>
                <a href="#" class="boton">CREAR CUENTA</a>
            </div>
            <div class="hero-image">
                <img src="" alt="">
            </div>
        </section>
    </header>
@stop
