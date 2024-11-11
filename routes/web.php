<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/',[FrontendController::class,'index']);
Route::get('/admin/dashboard',[AdminDashboardController::class,'index']);
Route::get('/admin/user',[UserController::class,'index'])->name('admin.user');
Route::post('/admin/user/store',[UserController::class,'store'])->name('admin.store');
Route::get('/admin/user/detail/{id}',[UserController::class,'userDetail'])->name('admin.detail');
Route::post('/admin/user/update/{id}',[UserController::class,'update'])->name('admin.update');

Route::get('/post', function () {
    return view('post');
});
Route::get('/single-post', function () {
    return view('single-post');
});

Route::get('/contact-us', function () {
    return view('contact');
});

Route::get('/about-us', function () {
    return view('about');
});
