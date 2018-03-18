<?php

namespace App\Http\Controllers;

use App\Post;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offset=0;
        $limit=30;
        if(!empty($request->offset)){
            $offset=$request->offset;
        }
        if(!empty($request->limit)){
            $limit=$request->limit;
        }
        $product=DB::select("SELECT name,price,images,location_name,created_at,updated_at FROM posts ORDER BY id DESC LIMIT $offset,$limit ");
        if(!empty($request->q)){
            $q=$request->q;
            $product=DB::select("SELECT name,price,images,location_name ,created_at,updated_at FROM posts WHERE name LIKE  '%".$q."%' ORDER BY id DESC LIMIT $offset,$limit ");
        }


        return Response::json(array(
            'products'    =>  $product),
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post,$id)
    {
        $product=DB::select("SELECT * FROM posts WHERE id =$id");
        $user=DB::select("SELECT users.* FROM users INNER JOIN posts ON users.id=posts.user_id WHERE posts.id=$id");
        foreach ($user as $detail){
            $user_id=$detail->id;
        }
        foreach ($product as $relate){
            $relate_category=$relate->sub_category_name;
        }
       $relate_posts=DB::select("SELECT users.* FROM users INNER JOIN posts ON users.id=posts.user_id WHERE  sub_category_name ='$relate_category' AND posts.id!=$id");
        $store=DB::select("SELECT * FROM stores WHERE  user_id=$user_id");
        if(count($product)){
            return Response::json(array(
                'product'    =>  $product,
                'user'=>$user,
                'store'=>$store,
                'relate_posts'=>$relate_posts
            ),
                200
            );
        }
        return Response::json(array(
            'error'    =>  "There is no result for this product id"),
            200
        );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
