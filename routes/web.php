<?php

use App\Http\Controllers\AboutUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController as AdminFrontendController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserPostController;

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

Route::middleware('isLogin')->group(function(){

    Route::get('/register', [AuthController::class, 'index'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/store', [AuthController::class, 'storeLogin'])->name('login.store');
});


// User

Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
    Route::post('/admin/user/reset-password/{id}', [UserController::class, 'passwordReset'])->name('admin.user.reset-password');
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.store');
    Route::get('/admin/user/detail/{id}', [UserController::class, 'userDetail'])->name('admin.detail');
    Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('admin.update');
    Route::get('/admin/user/delete/{id}', [UserController::class, 'destory'])->name('admin.destory');

    // Home Slide
    Route::get('/admin/home-slide', [HomeSliderController::class, 'index'])->name('admin.homeslide');
    Route::post('/admin/home-slide/store', [HomeSliderController::class, 'store'])->name('admin.homeslide.store');
    Route::get('/admin/home-slide/detail/{id}', [HomeSliderController::class, 'getHomeSliderDetail'])->name('admin.homeslide.detail');
    Route::post('/admin/home-slide/update/{id}', [HomeSliderController::class, 'update'])->name('admin.homeslide.update');
    Route::get('/admin/home-slide/delete/{id}', [HomeSliderController::class, 'destory'])->name('admin.homeslide.destory');
    Route::get('/admin/home-slide/status/{id}', [HomeSliderController::class, 'statusToggle'])->name('admin.homeslide.status');


    // FrontEnd
    Route::get('/admin/front-end', [AdminFrontendController::class, 'index'])->name('admin.frontend');
    Route::post('/admin/front-end', [AdminFrontendController::class, 'update'])->name('admin.frontend.update');

    // Site Datas
    Route::get('/admin/site-data',[AdminFrontendController::class,'siteData'])->name('admin.siteData');

    // Testimonial
    Route::get('/admin/testimonial', [TestimonialController::class, 'index'])->name('admin.testimonial');
    Route::post('/admin/testimonial/store', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
    Route::get('/admin/testimonial/detail/{id}', [TestimonialController::class, 'showDetail'])->name('admin.testimonial.detail');
    Route::post('/admin/testimonial/update/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
    Route::get('/admin/testimonial/delete/{id}', [TestimonialController::class, 'destory'])->name('admin.testimonial.destory');
    Route::get('/admin/testimonial/status/{id}', [TestimonialController::class, 'statusToggle'])->name('admin.testimonial.status');


    // Category
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/detail/{id}', [CategoryController::class, 'detailCategory'])->name('admin.category.detail');
    Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destory');
    Route::get('/admin/category/status/{id}', [CategoryController::class, 'statusToggle'])->name('admin.category.status');


    // Post
    Route::get('/admin/post', [PostController::class, 'index'])->name('admin.post');
    Route::post('/admin/post/store', [PostController::class, 'store'])->name('admin.post.store');
    Route::get('/admin/post/detail/{id}', [PostController::class, 'getDetail'])->name('admin.post.detail');
    Route::post('/admin/post/edit/{id}', [PostController::class, 'update'])->name('admin.post.update');
    Route::get('/admin/post/delete/{id}', [PostController::class, 'destroy']);
    Route::get('/admin/post/image/delete', [PostController::class, 'destoryImage']);
    Route::get('/admin/post/status/{id}', [PostController::class, 'statusToggle'])->name('admin.post.status');
    Route::get('/admin/post/comment/detail/{id}', [PostController::class, 'postComment'])->name('admin.post.comment');


    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
});


Route::get('/', [FrontendController::class, 'index'])->name('first.index');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

Route::get('/post', [UserPostController::class, 'index'])->name('post');
Route::get('/post/{id}', [UserPostController::class, 'singlePost'])->name('single.post');

// Comment
Route::post('/comment/store', [CommentController::class, 'store'])->name('store.comment');
Route::get('/comment/post/edit/{id}', [CommentController::class, 'edit'])->name('comment.edit');
Route::post('/comment/post/update/{id}', [CommentController::class, 'update'])->name('comment.update');
Route::get('/comment/post/delete/{id}', [CommentController::class, 'destroy'])->name('comment.destory');
Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');

