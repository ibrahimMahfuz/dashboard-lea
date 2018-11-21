<template>
    <tile :position="position" modifiers="overflow">
        <section class="hearable">
            <h1> {{hearable}}</h1>
            <ul>
                <li v-for="hear in hears">
                    {{hear}}
                </li>
            </ul>
        </section>
    </tile>
</template>

<script>
    import echo from '../mixins/echo';
    import Tile from './atoms/Tile';
    import saveState from 'vue-save-state';

    export default {
        components: {
            Tile,
        },

        mixins: [echo, saveState],

        props: ['position'],

        data() {
            return {
                hearable : 'Hearable tweet',
                hears : [
                    '@LEASIUnand',
                    '@siunand',
                    '#leasiunand',
                ],
            };
        },

        methods : {
            getEventHandlers() {
                return {
                    'Hearable.EventsFetched': response => {
                        this.hearable = response.hearable;
                    },
                };
            },
            getSaveStateConfig() {
                return {
                    cacheKey: 'hearable',
                };
            },
        }
    }

</script>
