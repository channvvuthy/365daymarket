<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Response;
use App\Save;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request$request, $id)
    {
        $offset=0;
        $limit=30;
        if(!empty($request->offset)){
            $offset=$request->offset;
        }
        if(!empty($request->limit)){
            $limit=$request->limit;
        }
        $user=DB::select("SELECT * FROM users WHERE  id=$id");
        $product_list_by_user=DB::select("SELECT * FROM posts  WHERE user_id=$id ORDER BY id DESC LIMIT $offset,$limit");
        $product_favorites=DB::select("SELECT * FROM saves WHERE user_id=$id");
        return Response::json(array(
            'user'    =>  $user,
            'product_list_by_user'=>$product_list_by_user,
            'product_favorites'=>$product_favorites
        ),
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
