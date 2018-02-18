<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getIdex(){
        return view('khmer24.index');
    }
}
