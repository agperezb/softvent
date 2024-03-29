window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
try {
    window.axios = require('axios');

    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('popper.js').default;
    window.bootstrap = require('bootstrap');
    window.Swal = require('sweetalert2');
    window.select2 = require('select2'),
    window.DataTable = require('datatables');
    require('air-datepicker/dist/js/datepicker.min');
    require('air-datepicker/dist/js/i18n/datepicker.es');
    require('datatables.net-buttons/js/dataTables.buttons.min');
    require('datatables.net-buttons/js/buttons.html5.min');
    require('datatables.net-buttons/js/buttons.colVis.min');
    require('datatables.net-fixedcolumns/js/dataTables.fixedColumns.min');
    window.pdfmake = require('pdfmake');
    window.pdfFonts = require('pdfmake/build/vfs_fonts');
    pdfMake.vfs = pdfFonts.pdfMake.vfs;
    window.JSZip = require('jszip');
} catch (e) {
}


/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
