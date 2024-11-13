<?php

namespace App\Http\Controllers;

use App\Models\frontend;
use App\Models\HomeSlide;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $frontend=frontend::first();
        $title="Hello world";
        $homeslides=HomeSlide::where('status','Active')->get();
        $testimonials=Testimonial::where('status','Active')->get();
        return view('home',compact(['frontend','title','homeslides','testimonials']));
    }
}
