<template>
    <tile :position="position" modifiers="overflow">
        <section class="regulation">
            <h1>{{peraturan}}</h1>
            <ul>
                <li v-for="isi in isis">
                    <div v-html="isi"></div>
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
                peraturan : 'Peraturan',
                loads : [
                    'Pengunjung dilarang meribut dalam labor',
                    'Pengunjung harus menjaga kebersihan labor',
                    'Pengunjung diwajibkan mengisi buku tamu',
                    'Pengunjung tidak diperbolehkan makan di dalam labor',
                    'Pengunjung dilarang menggunakan inventaris labor tanpa seizin asisten',
                    'Pengunjung dilarang memasuki area asisten LEA only',

                ],
                isis : [],
                indeks : 0,
                hapus : false,
            };
        },
        created(){
           setInterval(this.getIsi,2000);
        },

        methods : {
            async getIsi(){
                    this.isis.unshift(this.loads[this.indeks]);
                    this.indeks++;
                    if(this.indeks >= 6){
                        this.indeks = 0;
                        this.hapus = true;
                    }
                    if(hapus == true){
                        this.isis.pop();
                    }
            },
            getEventHandlers() {
                return {
                    'Regulation.EventsFetched': response => {
                        this.peraturan = response.peraturan;
                    },
                };
            },
            getSaveStateConfig() {
                return {
                    cacheKey: 'regulation',
                };
            },
        }
    }

</script>
