import { route } from "./routes.js";

window.route = route;

window.http = {
    token: document.querySelector('meta[name="csrf-token"]').content,
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
    },
    header: (key, value) => {
        return new Headers();
    },
    get: (url = '', data = {}) => {
        let $data = new URLSearchParams(data);
        const $request = new Request(url + '?' + $data, {
            method: 'GET',
            headers: window.http.headers,
            mode: 'cors',
            cache: 'no-cache',
        });
        return fetch($request);
    },
    post: (url = '', data = {}) => {
        return fetch(url, {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            credentials: 'same-origin',
            headers: window.http.headers,
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify(data)
        });
    },
    put: (url = '', data = {}) => {
        return fetch(url, {
            method: 'PUT',
            mode: 'cors',
            cache: 'no-cache',
            credentials: 'same-origin',
            headers: window.http.headers,
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify(data)
        });
    }
};