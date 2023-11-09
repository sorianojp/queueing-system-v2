import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Echo.channel('queues').listen('NewEvent', (e) => {
    console.log(e.queue);
    axios.get('/livequeues')
            .then(response => {
                const queuesList = document.getElementById('queues-list');
                queuesList.innerHTML = response.data;
            })
            .catch(error => {
                console.error(error);
            });
    axios.get('/liveservings')
            .then(response => {
                const nowServing = document.getElementById('now-serving');
                nowServing.innerHTML = response.data;
            })
            .catch(error => {
                console.error(error);
            });
    });
