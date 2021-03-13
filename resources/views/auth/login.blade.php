<form id="login" action="{{route('login')}}" method="POST" autocomplete="off">
    @csrf
    <div class="input-group-login">
        <label class="form-label">Correo electrónico</label>
        <input type="text" class="form-controls" name="email"
               placeholder="Digite su correo electrónico">
    </div>
    <div class="input-group-login">
        <label class="form-label">Contraseña</label>
        <div class="input-group-login password">
            <input type="password" class="form-controls" name="password"
                   id="password"
                   placeholder="Digite su contraseña">
            <span class="input-group-text" id="button-password"><i class="fa fa-eye"></i></span>
        </div>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
        <label class="form-check-label" for="remember_me">
            ¿Recordar?
        </label>
    </div>
    <div class="form-footer">
        <a id="button-forgot-password" type="button" class="text-link">
            ¿Olvidó su contraseña?
        </a>
        <button type="submit" class="button-login"><span>Acceder</span></button>
    </div>
</form>
