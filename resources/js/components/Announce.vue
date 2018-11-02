<template>
	<tile :position="position" modifiers="overflow">
		<section class="announce">
			<h1 v-html="announce"></h1>
			<ul>
				<div v-for="isi in isis">
                    <div v-if="relativeDate(isi.date) === 'Today'" style="text-align: center; vertical-align: middle">
                        <li>
                            <h1 style="color: chartreuse">{{isi.name}}</h1>
                            <h4>{{takeTime(isi.date)}}</h4>
                        </li>
                    </div>
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
            announce: 'Today Event/s',
            isis : [],
        };
    },
    created(){

    },

    methods : {
         relativeDate,
         takeTime,
    	 getEventHandlers() {
            return {
                'Announce.EventsFetched': response => {
                    this.announce = response.announce;
                }, 'Calendar.EventsFetched': response => {
                    this.isis = response.events;
                },
            };
        },
    	getSaveStateConfig() {
            return {
                cacheKey: 'announce',
            };
        },
    }
}

</script>
