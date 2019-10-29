<template>
    <div class="container">
        <div class="detail">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb">
                        <ul class="list-inline" v-for="pd in product">
                            <li>
                                <a href="">Home </a><i class="glyphicon glyphicon-menu-right"></i>
                            </li>
                            <li>
                                <a href="">{{pd.category_name}}</a><i class="glyphicon glyphicon-menu-right"></i>
                            </li>
                            <li>
                                <a href="">{{pd.sub_category_name}}  </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-pro">
            <div class="loading text-center" v-if="loading">
                <img src="http://localhost/May-2018/365daymarket/public/images/loading.gif" alt="">
            </div>
            <div class="col col-9">
                <div class="box">
                    <div v-for="pd in product">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <img data-target="#carouselExampleIndicators"
                                     v-for="(img,index) in imageJson(pd.images)"
                                     :class="{ 'active': index === 0 }" :data-slide-to="index" :src="img" alt=""
                                     width="90px" height="50px" class="indicator">
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item" v-for="(img,index) in imageJson(pd.images)"
                                     :class="{ 'active': index === 0 }">
                                    <img class="d-block w-100" v-bind:src="img" alt="First slide">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="box-white">
                                    <div class="col p-0">
                                        <h2 class="pd-title">{{pd.name}}</h2>
                                    </div>
                                    <div class="col p-0 col-2">
                                        <a href="">Share</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="box-white">
                                    <div class="price">
                                        ${{pd.price}}
                                    </div>
                                    <div class="post-date">
                                        <p>
                                            Post on : {{pd.created_at}}  View : {{pd.view}}
                                        </p>
                                    </div>
                                    <div class="discription">
                                        <h2>Description</h2>
                                        <p>{{pd.description}}</p>
                                    </div>
                                    <div class="phone" v-if="pd.phone">
                                        <p><i class="glyphicon glyphicon-earphone"></i> {{pd.phone}}</p>
                                    </div>
                                    <div class="email" v-if="pd.email">
                                        <p><i class="glyphicon glyphicon-envelope"></i> {{pd.email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="product-relate">
                                    <div class="title latest">
                                        <h2>
                                            Relate Ads
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-4 p-3 height" v-for="relate in relate_posts">
                                <div class="product-title">
                                    <div class="img-product">
                                        <a href=""><img :src="image(relate.images)" :alt="relate.name"
                                                        class="img-fluid"></a>
                                    </div>
                                    <h3 class="product-name">
                                        <a :href="'http://localhost:8000/product/'+relate.id">{{relate.name}}</a>
                                    </h3>
                                    <strong class="price">
                                        ${{relate.price}}
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-3 p-2">

                <div class="store" v-for="st in store">
                    <div class="store-header">
                        <img src="http://localhost:8000/images/ico_group.png" alt="profile"
                             style="widh:80px;height: 80px;border-radius: 50%;">
                        <div class="store-name">
                            <p>
                                {{st.name}}
                            </p>
                        </div>
                        <div class="show_all">
                            <a href="">
                                Show all post from this user
                            </a>
                        </div>
                    </div>
                    <div class="store-body">
                        <img src="http://localhost:8000/images/phone.png" alt="" class="phone">
                        <p class="phone-number" v-if="st.phone!=null">{{st.phone}}</p>
                        <p class="phone-number" v-if="st.phone==null">{{product[0].phone}}</p>
                        <div class="address clear-fix">
                            <div class="index_address" v-if="st.address!=null"><i
                                    class="glyphicon glyphicon-map-marker"></i> {{st.address}}
                            </div>
                            <div class="index_address" v-if="st.address==null"><i
                                    class="glyphicon glyphicon-map-marker"></i> {{product[0].location_name}}
                            </div>
                        </div>
                        <div class="url">
                            <p>

                                <a class="a-url" :href="'http://localhost:8000/store/'+user[0].id+'/'+st.name"><i
                                        class="glyphicon glyphicon-shopping-cart"></i>
                                    http://localhost:8000/store/{{user[0].id + '/' + st.name}}</a>
                            </p>
                        </div>
                        <div class="google">
                            <div v-if="st.google_map!=null">{{st.google_map}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
    i.glyphicon.glyphicon-menu-right {
        margin-left: 10px;
        font-size: 12px;
    }
</style>

<script>
    export default {
        created(){

            let url = window.location.href;
            let n = url.lastIndexOf('/');
            let id = url.substring(n + 1);
            axios.get('http://365daymarket.com/api/product/' + id)
                .then(respond => {
                    this.product = respond.data.product;
                    this.relate_posts = respond.data.relate_posts;
                    this.store = respond.data.store;
                    this.user = respond.data.user;
                    this.loading = false;
                });
        },
        methods: {
            image: function (data) {
                if (data != null) {
                    return JSON.parse(data)[0];
                }
            },
            imageJson: function (imageJson) {
                if (imageJson != null) {
                    return JSON.parse(imageJson);
                }
            }
        },
        data(){
            return {
                product: [],
                relate_posts: [],
                store: [],
                user:[],
                phone: "",
                loading: true
            }
        }
    }

</script>
