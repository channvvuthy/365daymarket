<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Store;
use Tymon\JWTAuth\Facades\JWTAuth;

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $offset = 0;
        $limit = 30;
        if (!empty($request->offset)) {
            $offset = $request->offset;
        }
        if (!empty($request->limit)) {
            $limit = $request->limit;
        }
        $user = DB::select("SELECT * FROM users WHERE  id=$id");
        $product_list_by_user = DB::select("SELECT * FROM posts  WHERE user_id=$id ORDER BY id DESC LIMIT $offset,$limit");
        $product_favorites = DB::select("SELECT * FROM saves WHERE user_id=$id");
        return Response::json(array(
            'user' => $user,
            'product_list_by_user' => $product_list_by_user,
            'product_favorites' => $product_favorites
        ),
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postProfile(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
    }

    public function postUpdateStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|min:6',
            'google_map' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $user = JWTAuth::parseToken()->authenticate();
        $userId = $user['id'];
        $name=$request->name;
        $address=$request->address;
        $phone=$request->phone;
        $google_map=$request->google_map;
        $photo=$request->file('photo');
        $image="";
        if(!empty($photo)){
            $fileName=$photo->getClientOriginalName();
            $newFile=md5(rand(1,100)).$fileName;
            $allow_ex=["jpg","PNG","png","gif"];
            $ex=$photo->getClientOriginalExtension();
            if(in_array($ex,$allow_ex)){
                return response()->json(['success' => false, 'error' => "Please upload image that validate extensions"]);

            }
            $photo->move("images",$newFile);
            $image=URL::to('/').'/images/'.$newFile;
        }
        try{
            $store=Store::where('user_id',$userId)->first();
            $store->user_id=$userId;
            $store->name=$name;
            $store->address=$address;
            $store->phone=$phone;
            $store->google_map=$google_map;
            $store->photo=$image;
            $store->save();
            return response()->json(['success' => true, 'message' => "Your store has been update completed!"]);
        }  catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => $exception->getMessage()]);

        }



    }
}
