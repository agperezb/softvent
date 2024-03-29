@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <header>
        <nav class="menu-navigation">
            <div class="menu-logo">
                <a href="#inicio"><img src="{{asset('settings/logo_primary.svg')}}" alt=""></a>
            </div>
            <div class="menu-items">
                <li><a href="#inicio" class="menu_items_list">Inicio</a></li>
                <li><a href="#caracteristicas" class="menu_items_list">Características</a></li>
                <li><a href="#ventajas" class="menu_items_list">Ventajas</a></li>
                <li><a href="#planes" class="menu_items_list">Planes</a></li>
                <li><a href="#contacto" class="menu_items_list">Contacto</a></li>
                <li>
                    <a id="button-login" class="menu_items_botton">INGRESAR</a>
                    <div class="content-login">
                        <div id="form-login" class="login hidden">
                            @include('auth.login')
                        </div>
                    </div>
                </li>
                <li><a href="" class="menu_items_bottom-bold">CREAR CUENTA</a></li>
            </div>
        </nav>
        <section class="hero" id="inicio">
            <div class="hero-textos">
                <h1>Software de Ventas <span>SOFTVENT</span> para Pymes</h1>
                <p>Fácil de adquirir y usar, con un equipo de soporte listo cuando lo necesite!</p>
                <div class="btn-group">
                    <a href="#" class="boton">¡Contáctanos!</a>
                    <a href="#" class="boton_bold">CREAR CUENTA</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="{{asset('settings/img1.svg')}}" alt="reportes">
            </div>
            <div class="features">
                <div class="feature-item">
                    <img src="{{asset('settings/ordenador.svg')}}" alt="">
                    <span>Inicie Fácil</span>
                </div>
                <div class="feature-item">
                    <img src="{{asset('settings/config.svg')}}" alt="">
                    <span>Agilice Procesos</span>
                </div>
                <div class="feature-item">
                    <img src="{{asset('settings/negocio.svg')}}" alt="">
                    <span>Controle su Empresa</span>
                </div>
                <div class="feature-item">
                    <img src="{{asset('settings/investigacion.svg')}}" alt="">
                    <span>Crezca sin Límites</span>
                </div>
            </div>
        </section>
    </header>
    <main>
        <section class="containers" id="caracteristicas">
            <h2 class="section-title">Siempre un paso adelante</h2>
            <div class="advantage">
                <div class="advantage-image">
                    <img src="{{asset('settings/Analytics.svg')}}" alt="">
                </div>
                <div class="advantage-cards">
                    <div class="item-one">
                        <h2>SOFTVENT:La mejor opción para su éxito</h2>
                        <span>No solo lo hacemos bien, también lo hacemos fácil</span>
                    </div>
                    <div class="card_item">
                        <span><i class="fas fa-file-pdf"></i></span>
                        <div class="card_item_text">
                            <h2>Reportes PDF y Excel</h2>
                            <p>SOFTVENT te permite generar reportes en PDF o Excel diarios, semanales o mensuales.</p>
                        </div>
                    </div>
                    <div class="card_item">
                        <span><i class="fas fa-file-alt"></i></span>
                        <div class="card_item_text">
                            <h2>Informacion 24/7</h2>
                            <p> En SOFTVENT la informacion siempre estara disponible donde quiera que estes ya que se
                                encuentra en servidores en la nume 24/7.</p>
                        </div>
                    </div>
                    <div class="card_item">
                        <span><i class="fas fa-plus"></i></span>
                        <div class="card_item_text">
                            <h2>Gana puntos</h2>
                            <p>En SOFTVENT tus clientes podran acumular puntos que podran canjear en beneficios que tu
                                dispongas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="trust" id="ventajas">
            <div class="trust-items">
                <h2 class="section-title">Por qué confiar en SOFTVENT:</h2>
                <div class="target">
                    <div class="target-icon">
                        <div class="content-target-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="target-text">
                        <h2>+1000</h2>
                        <p>Usuarios</p>
                    </div>
                </div>
                <div class="target target-one">
                    <div class="target-icon">
                        <div class="content-target-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                    </div>
                    <div class="target-text">
                        <h2>Ultimas tegnologías</h2>
                        <p>Tegnologías actualizadas y seguras</p>
                    </div>
                </div>
                <div class="target target-two">
                    <div class="target-icon">
                        <div class="content-target-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="target-text">
                        <h2>+1 año</h2>
                        <p>de experiencia en el mercado</p>
                    </div>
                </div>
                <div class="target target-three">
                    <div class="target-icon">
                        <div class="content-target-icon">
                            <i class="fas fa-medal"></i>
                        </div>
                    </div>
                    <div class="target-text">
                        <h2>4.7 estrellas</h2>
                        <p>por nuestros clientes</p>
                    </div>
                </div>

            </div>
            <div class="trust-image">
                <img src="{{asset('settings/Ranking.svg')}}" alt="">
            </div>
        </section>
        <section class="price" id="planes">
            <h2 class="section-title">Planes</h2>
            <div class="cards-content">
                <div class="card-price">
                    <h2>Plan Free</h2>
                    <p>0 COP/Mes</p>
                    <span>Gratis por 1 mes</span>
                    <span>100 productos</span>
                    <span>5 provedores</span>
                    <span>Facturas ilimitadas</span>
                    <a href="" class="boton-price">ELEGIR PLAN</a>
                </div>
                <div class="card-price card-price-bold">
                    <h2>Plan Mensual</h2>
                    <p>20.000 COP/Mes</p>
                    <span>Otro mes gratis</span>
                    <span>Productos ilimitados</span>
                    <span>Provedores ilimitados</span>
                    <span>Facturas ilimitadas</span>
                    <a href="" class="boton-price">ELEGIR PLAN</a>
                </div>
                <div class="card-price">
                    <h2>Plan Anual</h2>
                    <p>180.000 COP/Año</p>
                    <span>Pagas 9 meses</span>
                    <span>Productos ilimitados</span>
                    <span>Provedores ilimitados</span>
                    <span>Facturas ilimitadas</span>
                    <a href="" class="boton-price">ELEGIR PLAN</a>
                </div>
            </div>
        </section>
        <section class="opinions" id="opinions" style="background: url('{{asset('settings/fondo.png')}}')">
            <h2 class="section-title">Testimonios</h2>
            <div class="content-opinion">
                <div class="content-slider">
                    <span class="descrip-slider">Los invito a utilizar este excelente programa. No tiene pierde y cuenta con el mejor soporte técnico y todas las herramientas necesarias. Excelente. Felicitaciones.</span>
                    <span class="name-slider">Angel Gustavo Pérez</span>
                </div>
                <div class="content-slider">
                    <span class="descrip-slider">Hace poco compré mi licencia de sofvent y estoy feliz, que herramienta tan fabulosa, realmente es el software más completo que he conocido. Y ni que hablar del soporte, excelente la atención para la resolución de las dudas e inquietudes</span>
                    <span class="name-slider">Angel Gustavo Pérez</span>
                </div>
                <div class="content-slider">
                    <span class="descrip-slider">En conclusión, excelente empresa con un excelente equipo de trabajo de profesionales y una excelente herramienta como es Softvent, gracias por dárnosla a conocer y brindarnos todos sus conocimientos muy útiles para nuestro desarrollo profesional.</span>
                    <span class="name-slider">Angel Gustavo Pérez</span>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer-top">
            <div class="red-social">
                <span><i class="fab fa-facebook"></i></span>
                <span><i class="fab fa-twitter"></i></span>
                <span><i class="fab fa-youtube"></i></span>
            </div>
            <div class="contact">
                <span>Sofvent®</span>
                <span>agperezb@ufpso.edu.co</span>
                <span>+57 3122671490</span>
            </div>
            <div class="newsletter">
                <span>Suscribete</span>
                <div class="input-boton">
                    <input type="text" placeholder="Digita tu correo">
                    <a href="#">Suscribirse</a>
                </div>
            </div>
        </div>
        <div class="footer-botton"><small>&copy;2021 Sofvent® - Todos los derechos reservados</small></div>
    </footer>

<!--
    <div id="form-login" class="modal-container hidden">
        <div id="modal-content" class="modal">
            <div class="modal-header">
                <button id="modal_close" type="button" class="close">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <span>Hola soy una modal</span>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>-->
@stop
