window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });


 import Echo from "laravel-echo";
//
// window.io = require('socket.io-client');
//
// if (typeof io !== 'undefined') {
//     window.Echo = new Echo({broadcaster: 'socket.io', host: window.location.hostname + ':6001',});
// }
//
//
// import Echo from 'laravel-echo'

window.io = require('socket.io-client');
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
});
// Echo.join(`chat.${roomId}`)
// Echo.join(`chat.${roomId}`)
// window.Echo.channel(`order.${post}`)
 var post = 252;
console.log(window.Echo);


window.Echo.private(`order.${post}`)
    .listen('NewBroadcastNotification', (e) => {
        console.log(e);
    });
// Echo.private(`App.User.${userId}`)
//     .notification((notification) => {
//         console.log(notification.type);
//     });



//TODO:move to another place
// window.Laravel = {!! json_encode([
//     'user' => auth()->check() ? auth()->user()->id : null,
// ]) !!};
// use window.Laravel.user
