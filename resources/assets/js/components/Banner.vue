<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="banner" v-for="banner in banners" :key="banner.id">
                    <img v-bind:src="'http://www.365daymarket.com/'+banner.image" alt="">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created(){
            "use strict";
            axios.get('http://365daymarket.com/api/banner?position=Top')
                .then(respond => {
                    this.banners = respond.data.banners;

                });
        },
        data(){
            "use strict";
            return {
                banners: [],
            }
        }
    }
</script>
