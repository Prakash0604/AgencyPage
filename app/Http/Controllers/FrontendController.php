<?php

namespace App\Http\Controllers;

use App\Models\frontend;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $frontend=frontend::first();
        $title="Hello world";
        return view('home',compact(['frontend','title']));
    }
}
