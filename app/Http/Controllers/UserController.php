<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Store;
use Auth;
use Mail;
use App\Save;
use App\User;
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
        // 
    public function postRegister(Request $request){
        $this->validate($request,[
            'email'=>'required|unique:users',
            'password'=>'required|min:5',
            'cpassword'=>'required|min:5',
        ]);

        $user=new User();
        $string = $request->email;
        $string = substr($string, 0, strpos($string, '@'));
        $fullname= preg_replace('/[0-9]+/', '', $string);
        $user->name=$fullname;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $registerkey=bcrypt($request->email);
        $registerkey=str_replace("/","",$registerkey);
        $user->verification_code=$registerkey;
        $user->save();

        $store=new Store();
        $store->name=$fullname;
        $store->user_id=$user->id;
        $store->save();
        // $to =$request->email;
        // $subject = "Confirmation Email";
        // $message = "
        // <html>
        // <head><title>Please Confirmation Email!</title></head>
        // <body>
        // <h2>Welcome to 365daymarket.com/</h2>
        // <a href='http://365daymarket.com/confirm?".$registerkey."'>Click Here</a>
        // <p>Thank for register with us!</p>
        // <p>Sincerely,</p><p>The Jongnhams Team.</p>
        // </body>
        // </html>
        // ";
        // // Always set content-type when sending HTML email
        // $headers = "MIME-Version: 1.0" . "\r\n";
        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // // More headers
        // $headers .= 'From: <moeun.djsmart@gmail.com>' . "\r\n";
        // if(mail($to,$subject,$message,$headers)){
            return redirect()->back()->with('message','Please Confirm Your Email Address');
        // }

    }
    public function getConfirm(Request $request){
        
    }
    public function postLogin(Request $request){
        // $this->validate($request,[
        //     'email'=>'required|unique:users',
        // ]);
        // $oldUrl=URL::previous();
        $email=$request->email;
        $password=$request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
           if(Auth::user()->verified =="1"){
             return redirect()->back();
           }else{
               Auth::logout();
               return redirect()->back()->with('message_login_error','<a href="https://mail.google.com/">Please confirm your email address to login</a>');
           }
        }
        return redirect()->back()->withInput()->withErrors(['message__error'=>'Incorrect Email or Password']);
    }
    public function logoutUser(){
        Auth::logout();
        return redirect()->back();
    }
}
