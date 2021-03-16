<div class="wrapper-main">
    <div class="main-header">
        <div class="header-rol">

        </div>
        <div class="header-user">
            <span class="user-notificacion"><i class="fas fa-bell"></i><span>5</span></span>
            <div class="user-account">
                <div class="user-photo">
                    <i class="fas fa-user-circle"></i>
                    <!--<img src="" alt="">-->
                </div>
                <div class="user-name">
                    <span class="user-rol">Administrador</span>
                    <span class="profile">agperezb<span><i class="fas fa-caret-down"></i></span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="main-sidebar">
        <div class="sidebar-logo">
            <img src="{{asset('settings/logo_primary.svg')}}" alt="">
        </div>
        <div class="sidebar-button">
            <a href="" class="cta-button">
                <div class="border-focus"></div>
                <i class="fas fa-box-open"></i>
                <span>Productos</span>
            </a>
            <a href="" class="cta-button active">
                <div class="border-focus"></div>
                <i class="fas fa-box-open"></i>
                <span>Categorías</span>
            </a>
        </div>
    </div>
    <div class="main-content">
        @yield('content')
    </div>
    @yield('modal')
</div>
