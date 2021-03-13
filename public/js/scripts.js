$(document).ready(function () {

    //Slider testimonios
    let slider = document.querySelector(".content-opinion")
    let sliderIndividual = document.querySelectorAll(".content-slider")
    let contador = 1;
    let width = sliderIndividual[0].clientWidth;
    let intervalo = 4000;

    window.addEventListener("resize", function () {
        width = sliderIndividual[0].clientWidth;
    })

    setInterval(function () {
        slides();
    }, intervalo);


    function slides() {
        slider.style.transform = "translate(" + (-width * contador) + "px)";
        slider.style.transition = "transform .8s";
        contador++;

        if (contador == sliderIndividual.length) {
            setTimeout(function () {
                slider.style.transform = "translate(0px)";
                slider.style.transition = "transform 0s";
                contador = 1;
            }, 1500)
        }
    }

    //login

    $('#button-login').click(function () {
        let login = $('#form-login');
        $('#login').trigger("reset");
        if (login.hasClass('hidden')) {
            login.removeClass('hidden');
        } else {
            login.addClass('hidden');
        }
    });

    $(document).on("click", function (e) {
        let login = $('#login');
        let loginButton = $('#button-login');
        if (!login.is(e.target) && login.has(e.target).length === 0 && !loginButton.is(e.target) && loginButton.has(e.target).length === 0) {
            $('#form-login').addClass('hidden');
        }
    });

    $('#button-password').click(function () {
        if ($('#password').attr('type') === 'password') {
            $('#password').get(0).type = 'text';
            $('#button-password i').removeClass('far fa-eye');
            $('#button-password i').addClass('far fa-eye-slash');
        } else {
            $('#password').get(0).type = 'password';
            $('#button-password i').removeClass('far fa-eye-slash');
            $('#button-password i').addClass('far fa-eye');
        }
    });
})


