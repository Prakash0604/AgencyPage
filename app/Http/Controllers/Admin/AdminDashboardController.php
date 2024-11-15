<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index(){
        $totaluser=User::count();
        $admin=User::where('role','Admin')->count();
        $user=User::where('role','User')->count();
        $post=Post::count();

        return view('Admin.pages.Dashboard.index',compact('totaluser','admin','user','post'));
    }
}
