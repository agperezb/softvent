const language = {
    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "No hay datos disponibles para visualizar",
    "info": "Mostrando _START_ - _END_ de _TOTAL_ registros",
    "infoEmpty": "",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "<i class='fa fa-chevron-right'><i>",
        "previous": "<i class='fa fa-chevron-left'><i>"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Columnas <i class='fa fa-eye'></i>",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %d fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "Csv <i class='fa fa-file-csv'></i>",
        "excel": "Excel <i class='fa fa-file-excel'></i>",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "1": "Mostrar 1 fila",
            "_": "Mostrar %d filas"
        },
        "pdf": "Pdf <i class='fa fa-file-pdf'></i>",
        "print": "Imprimir"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
    },
    "decimal": ",",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
            "date": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "not": "No",
                "notBetween": "No entre",
                "notEmpty": "No Vacio"
            },
            "moment": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "not": "No",
                "notBetween": "No entre",
                "notEmpty": "No vacio"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacio",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual que",
                "not": "No",
                "notBetween": "No entre",
                "notEmpty": "No vacío"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina en",
                "equals": "Igual a",
                "not": "No",
                "notEmpty": "No Vacio",
                "startsWith": "Empieza con"
            }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d"
    },
    "select": {
        "1": "%d fila seleccionada",
        "_": "%d filas seleccionadas",
        "cells": {
            "1": "1 celda seleccionada",
            "_": "$d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        }
    },
    "thousands": "."
};
//show_image
function category_image(id) {
    $.get("/categories/image/" + id, function (data) {
        $("#image-card").attr("src", "data:image/png;base64," + data);
        $("#image-modal").modal('show');
    });
}

function product_image(id) {
    $.get("/products/image/" + id, function (data) {
        $("#image-card").attr("src", "data:image/png;base64," + data);
        $("#image-modal").modal('show');
    });
}

function message_toast(icon, text) {
    let time = 2500;
    Swal.fire({
        icon: icon,
        text: text,
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: time
    });
}

//delete
function deleteConfirm($id) {
    Swal.fire({
        title: '¿Está seguro de eliminar?',
        text: "Esta operación no es reversible.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f97f16',
        cancelButtonColor: '#e60017',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#delete' + $id).submit();
        }
    })
}

$(document).ready(function () {

    /*//Slider testimonios
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
    }*/

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


    let height = $(window).height();
    let margin = 205 - height;
    let fixedColumns = 0;

    /*if ($('.controls-main').length === 1) {
        margin = margin + 60;
    }

    if ($('.nav-tabs').length === 1) {
        margin = margin + 60;
    }*/


    let table = $('.table-pagination');
    if (table) {
        table.DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
            scrollY: 400,
            scrollX: true,
            fixedColumns: {
                leftColumns: 0,
                rightColumns: 0
            },
            language: language,
            pageLength: 25,
        });
    }

    let search = $('.dataTables_filter input');

    search.attr('placeholder', 'Búsqueda rápida...');
    search.after('<span><i class="fa fa-search"></i><span>')
    /* -------------------- */

    /* ------Tooltip-------- */
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    /* -------------------- */

    let url = window.location;
    let cta_button = $('.cta-button');
    let link_navigation = $('.link-navigation');
    cta_button.removeClass('cta-button_active');
    link_navigation.removeClass('link-navigation-active');

    if (url.toString().indexOf('dashboard') !== -1) {
        $('.dashboard').addClass('cta-button_active');
    }
    if (url.toString().indexOf('categories') !== -1) {
        $('.categories').addClass('cta-button_active');
        $('#categories').addClass('link-navigation-active')
    }
    if (url.toString().indexOf('commerces') !== -1) {
        $('.users').addClass('cta-button_active');
        $('#commerces').addClass('link-navigation-active')
    }
    if (url.toString().indexOf('cashiers') !== -1) {
        $('.cashiers').addClass('cta-button_active');
        $('#cashiers').addClass('link-navigation-active')
    }
    if (url.toString().indexOf('administrators') !== -1) {
        $('.users').addClass('cta-button_active');
        $('#administrators').addClass('active');
    }
    if (url.toString().indexOf('providers') !== -1) {
        $('.providers').addClass('cta-button_active');
    }
    if (url.toString().indexOf('products') !== -1) {
        $('.products').addClass('cta-button_active');
    }

    /*$('.my-datepicker').datepicker({
        dateFormat: 'yyyy-mm-dd'
    });

    $('.date-pick').datepicker({
        language: {
            days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            daysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
            daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            today: 'Hoy',
            clear: 'Limpiar',
            dateFormat: 'yyyy-mm-dd',
            timeFormat: 'hh:ii aa',
            firstDay: 1
        },
        dateFormat: 'yyyy-mm-dd'
    });

    $('.datetime-pick').datepicker({
        language: {
            days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            daysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
            daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            today: 'Hoy',
            clear: 'Limpiar',
            dateFormat: 'yyyy-mm-dd',
            timeFormat: 'hh:ii aa',
            firstDay: 1
        },
        timepicker: true,
        timeFormat: 'hh:ii',
        dateFormat: 'yyyy-mm-dd'
    });*/
})


