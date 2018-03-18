<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',['uses'=>'HomeController@getIdex','as'=>'home']);
Route::get('ajax-request-sub-category',['uses'=>'CategoryController@getAjaxRequestSubCategory','as'=>'ajax-request-sub-category']);
Route::get('/test',function (){
    $faker = Faker\Factory::create();
    $image=array();
    $brand=['Apple','Asus','Acer','HP','Dell'];
    $sub_category_name=['Computer','Phone, Tablet','omputers accessories','Phone Accessories'];
    $category_name=['Phone & Table','Computer','Electronic'];
    $location=['Kompung Cham','Kandal','Takeo','Phnom Penh'];
    for ($i=1;$i<=50;$i++){
        $post=new App\Post();
        $post->name=$faker->name;
        $post->description=$faker->sentence;
        $post->price=$faker->buildingNumber;
        $post->email=$faker->email;
        $post->phone=$faker->phoneNumber;
        array_push($image,$faker->imageUrl());
        array_push($image,$faker->imageUrl());
        array_push($image,$faker->imageUrl());
        $post->images=json_encode($image);
        $post->user_id=rand(1,50);
        $post->brand=$brand[rand(0,4)];
        $post->sub_category_name=$sub_category_name[rand(0,3)];
        $post->category_name=$category_name[rand(0,2)];
        $post->address=$faker->address;
        $post->location_name=$location[rand(0,3)];
        $post->save();


        $post->save();
    }

});

Route::get('register',['uses'=>'SingUpController@register','as'=>'register']);
Route::get('user/verify/{code}',['uses'=>'SingUpController@getVerify','as'=>'verify']);
Route::get('recover',['uses'=>'SingUpController@recover','as'=>'recover']);

Route::get('login',['uses'=>'SignInController@getLogin','as'=>'login']);
