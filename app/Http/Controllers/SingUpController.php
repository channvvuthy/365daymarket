<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class SingUpController extends Controller
{
    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        $image=$request->file("image");
        $image->move()

    }
    public  function register(){
        return view('register');
    }
}
