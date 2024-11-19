<?php

namespace App\Http\Controllers;

use App\Models\HomeSlide;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $homeslides=HomeSlide::all();
        return view('contact',compact('homeslides'));
    }
}
