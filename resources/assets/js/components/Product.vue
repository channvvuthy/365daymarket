<template>
    <div class="container">
        <div class="title latest">
            <h2>
                Latest Ads
            </h2>
        </div>
        <div class="row row-pro">

            <div class="loading text-center" v-if="loading">
                <img src="images/loading.gif" alt="">
            </div>
            <div class="col col-3 p-3 height" v-for="product in products">
                <div class="product-title">

                    <div class="img-product">
                        <a href="">
                            <img v-bind:src="image(product.images)" v-bind:alt="product.name" class="img-fluid">
                        </a>
                    </div>
                    <h3 class="product-name">
                        <a v-bind:href="'product/'+product.id">{{product.name}}</a>
                    </h3>
                    <strong class="price">
                        ${{product.price}}
                    </strong>
                </div>
            </div>
            <div class="col col-12 mt-5" v-if="products.length>0">
                <button class="btn-primary btn btn-block"><a href="search-result?postby=last&category=&location=&p=&search_param=all">View All</a></button>
            </div>
        </div>
        <div class="title latest" v-if="loading==false">
            <h2>
                Popular Ads
            </h2>
        </div>
        <div class="row row-pro">
            <div class="col col-3 p-3 height" v-for="popular in populars">
                <div class="product-title">

                    <div class="img-product">
                        <a href="">
                            <img v-bind:src="image(popular.images)" v-bind:alt="popular.name" class="img-fluid">
                        </a>
                    </div>
                    <h3 class="product-name">
                        <a v-bind:href="'product/'+popular.id">{{popular.name}}</a>
                    </h3>
                    <strong class="price">
                        ${{popular.price}}
                    </strong>
                </div>
            </div>
            <div class="col col-12 mt-5" v-if="products.length>0">
                <button class="btn-primary btn btn-block"><a href="search-result?postby=popular&category=&location=&p=&search_param=all">View All</a></button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created(){
            axios.get('http://365daymarket.com/api/product?limit=40')
                .then(respond => {
                    this.products = respond.data.products;
                    this.populars = respond.data.popular_products;
                    this.loading = false;
                });
        },
        methods: {
            image: function (data) {
                if (data != null) {
                    return JSON.parse(data)[0];
                }
            }
        },
        data(){
            return {
                products: [],
                populars: [],
                loading: true
            }
        }
    }
</script>
