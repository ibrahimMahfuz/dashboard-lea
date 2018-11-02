<template>
    <tile :position="position" modifiers="overflow">
        <section class="calendar">
            <h1 class="calendar__title">Upcoming</h1>
            <ul class="calendar__events">
                <div v-for="event in events">
                    <li v-if="relativeDate(event.date) !== 'Today'" class="calendar__event">
                        <h2 class="calendar__event__title">{{ event.name }}</h2>
                        <div class="calendar__event__date">{{ relativeDate(event.date) }}</div>
                        <div class="calendar__event__time">{{ takeTime(event.date) }}</div>
                    </li>
                </div>
            </ul>
        </section>
    </tile>
</template>

<script>
import echo from '../mixins/echo';
import Tile from './atoms/Tile';
import saveState from 'vue-save-state';
import { relativeDate } from '../helpers';
import { takeTime } from '../helpers';

export default {
    components: {
        Tile,
    },

    mixins: [echo, saveState],

    props: ['position'],

    data() {
        return {
            events: [],
        };
    },

    methods: {
        relativeDate,
        takeTime,

        getEventHandlers() {
            return {
                'Calendar.EventsFetched': response => {
                    this.events = response.events;
                },
            };
        },

        getSaveStateConfig() {
            return {
                cacheKey: 'calendar',
            };
        },
    },
};
</script>
