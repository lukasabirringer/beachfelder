<template>
    <span>
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(beachcourt)" class="beachcourt-item__favorite beachcourt-item__favorite--is-favorited tipso-favorite" data-tipso="Aus Favoriten entfernen">
            <span class="" data-feather="heart"></span>
        </a>
        <a href="#" v-else @click.prevent="favorite(beachcourt)" class="beachcourt-item__favorite tipso-favorite" data-tipso="Zu Favoriten hinzufügen">
            <span class="" data-feather="heart"></span>
        </a>
    </span>
</template>
<script>

    export default {
        props: ['beachcourt', 'favorited'],
        
        data: function() {
            return {
                isFavorited: '',
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            favorite(beachcourt) {
                axios.post('/favorite/'+beachcourt)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(beachcourt) {
                axios.post('/unfavorite/'+beachcourt)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>
