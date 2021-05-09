<div class="wrapper-main">
    <div class="logo-dashboard">
        <img src="{{asset('settings/logo_primary.svg')}}" alt="">
    </div>
    <div class="main-header">
        <div class="header-navigation">
            @yield('navigation')
        </div>
        <div class="header-user">
            <span class="user-notificacion"><i class="fas fa-bell"></i><span>5</span></span>
            <div class="user-account">
                <div class="user-name">
                    <span class="user-rol">@if(Auth::user()->user_profile == "administrator")Administrador @elseif(Auth::user()->user_profile == "commerce")Comercio @else Cajero @endif</span>
                    <span class="profile">agperezb</span>
                </div>
                <div class="user-photo">
                    <i class="fas fa-user-circle"></i>
                    <!--<img src="" alt="">-->
                </div>
                <a><i class="fas fa-caret-down"></i></a>
            </div>
        </div>
    </div>
    <div class="main-sidebar">
        <div class="sidebar-button">
            <a href="{{route('dashboard')}}" class="cta-button dashboard">
                <div class="border-focus"></div>
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            @if(Auth::user()->user_profile == "administrator")
                <a href="{{route('commerces')}}" class="cta-button users">
                    <div class="border-focus"></div>
                    <i class="fas fa-users"></i>
                    <span>Usuarios</span>
                </a>
            @endif
            @if(Auth::user()->user_profile == "commerce")
                <a href="{{route('cashiers')}}" class="cta-button cashiers">
                    <div class="border-focus"></div>
                    <i class="fas fa-user-friends"></i>
                    <span>Cajeros</span>
                </a>
            @endif
            <a href="{{route('products')}}" class="cta-button products">
                <div class="border-focus"></div>
                <i class="fas fa-box-open"></i>
                <span>Productos</span>
            </a>
            <a href="{{route('providers')}}" class="cta-button providers">
                <div class="border-focus"></div>
                <i class="fas fa-hand-holding-medical"></i>
                <span>Provedores</span>
            </a>
            @if(Auth::user()->user_profile == "administrator")
                <a href="{{route('categories')}}" class="cta-button categories">
                    <div class="border-focus"></div>
                    <i class="fas fa-clipboard-list"></i>
                    <span>Categorías</span>
                </a>
            @endif
            <a id="logout" class="cta-button">
                <div class="border-focus"></div>
                <i class="fas fa-sign-out-alt"></i>
                <span>Cerrar sesión</span>
            </a>
            <form action="{{route('logout')}}" id="form-logout" method="POST">
                @csrf
            </form>
        </div>
    </div>
    <div class="main-content">
        @yield('content')
    </div>
    @yield('modal')
</div>
<script>
    $('#logout').click(function () {
        $('#form-logout').submit();
    });
</script>
