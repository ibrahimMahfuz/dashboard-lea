import './bootstrap.js';

import Echo from 'laravel-echo';
import Vue from 'vue';

import Announce from './components/Announce';
import Dashboard from './components/Dashboard';
import Calendar from './components/Calendar';
import Github from './components/Github';
import Hearable from './components/Hearable';
import InternetConnection from './components/InternetConnection';
import Music from './components/Music';
import Npm from './components/Npm';
import Packagist from './components/Packagist';
import Piket from './components/Piket';
import Regulation from './components/Regulation';
import Tasks from './components/Tasks';
import TimeWeather from './components/TimeWeather';
import Twitter from './components/Twitter';
import Uptime from './components/Uptime';

new Vue({
    el: '#dashboard',

    components: {
        Announce,
        Dashboard,
        Calendar,
        Github,
        Hearable,
        InternetConnection,
        Music,
        Npm,
        Packagist,
        Piket,
        Regulation,
        Tasks,
        TimeWeather,
        Twitter,
        Uptime,
    },

    created() {
        let options = {
            broadcaster: 'pusher',
            key: window.dashboard.pusherKey,
            cluster: window.dashboard.pusherCluster,
        };

        if (window.dashboard.usingNodeServer) {
            options = {
                broadcaster: 'socket.io',
                host: 'http://dashboard.spatie.be:6001',
            };
        }

        this.echo = new Echo(options);
    },
});
