<?php

namespace App\Http\Controllers;

use App\Models\frontend;
use App\Models\User;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){
        $users=User::where('role','Admin')->get();
        $frontend=frontend::first();
        return view('about',compact('users','frontend'));
    }
}
