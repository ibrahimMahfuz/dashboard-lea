<template>
	<tile :position="position" modifiers="overflow">
		<section class="piket">
			<h1> Piket hari : {{hari}}</h1>
			<ul>
				<li v-for="isi in isim">
					{{isi}}
				</li>
			</ul>
		</section>
	</tile>
</template>

<script>
import echo from '../mixins/echo';
import Tile from './atoms/Tile';
import saveState from 'vue-save-state';
import { getNow } from '../helpers';

	export default {
		 components: {
        Tile,
    },

    mixins: [echo, saveState],

    props: ['position'],

     data() {
        return {
            hari : getNow(),
            isim : ['Ibrahim', 'Nazhifa', 'Annisa','Kia','Kelfin','Aldo','Indah'],
        };
    },

    methods : {
    	 getEventHandlers() {
            return {
                'Announce.EventsFetched': response => {
                    this.judul = response.judul;
                },
            };
        },
    	getSaveStateConfig() {
            return {
                cacheKey: 'piket',
            };
        },
    }
}

</script>
