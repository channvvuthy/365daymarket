<template>
    <div class="container">
        <div class="row">
            <div class="col col-3 main-nav">
                <div class="ul parent">
                    <ul class="list-unstyled">
                        <li v-for="nav in navigation" v-bind:key="nav.id" v-bind:id="nav.id">
                            <a href="" v-text="nav.name"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col col-9">
                <div class="child">
                    <div class="list">
                        <div v-for="nav in navigation" v-bind:class="'parent_id_'+nav.id+' none'">
                            <ul class="list-inline">
                                <li class="list-inline-item" v-for="sub in nav.sub_category">
                                    <a href="" v-text="sub.name" ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['navigation'],
    }
</script>
