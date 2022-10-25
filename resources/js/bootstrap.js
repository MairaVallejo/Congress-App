import _ from 'lodash';
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

import inputmask from 'inputmask';
window.Inputmask = inputmask;

String.prototype.formatUnicorn = function () {
    "use strict";
    var str = this.toString();
    if (arguments.length) {
        var t = typeof arguments[0];
        var key;
        var args = ("string" === t || "number" === t) ?
            Array.prototype.slice.call(arguments)
            : arguments[0];

        for (key in args) {
            str = str.replace(new RegExp("\\{" + key + "\\}", "gi"), args[key]);
        }
    }

    return str;
};

window.useModal = function useModal() {
    window.openModal = function openModal(type, id) {
        const modalClone = document.getElementById(`template-modal-${type}`).content.cloneNode(true);
        const div = document.createElement('div');
        div.setAttribute("id", `modal-${id}-container`);
        div.appendChild(modalClone);
        div.innerHTML = div.innerHTML.formatUnicorn({
            id
        });
        document.getElementById("modal-container").appendChild(div);
        setTimeout(() => {
            const modalCheckbox = document.getElementById(`modal-${type}-${id}`);
            modalCheckbox.checked = true;
            modalCheckbox.addEventListener('change', (event) => {
                if (!event.target.checked) {
                    event.target.parentNode.parentNode.removeChild(event.target.parentNode);
                }
            })
        }, 10);
    }

    document.querySelectorAll('button[data-type]').forEach(input => {
        input.addEventListener('click', e => {
            openModal(input.getAttribute("data-type"), parseInt(e.target.closest(
                'tr[data-id]')
                .getAttribute("data-id")))
        })
    });
}