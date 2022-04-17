<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route to return posts blade
Route::get('posts',[PostController::class,'index'])->middleware('auth')->name('posts.index');

//route to create post
Route::post('store',[PostController::class,'store'])->middleware('auth')->name('posts.store');

//route to get post blade
Route::get('create',[PostController::class,'create'])->middleware('auth')->name('posts.create');

//route to get edit blade
Route::get('edit/{postId}',[PostController::class,'edit'])->middleware('auth')->name('posts.edit');

//route to update post on database
Route::post('update/{postId}',[PostController::class,'update'])->middleware('auth')->name('posts.update');

//route to delete post
Route::get('delete/{postId}',[PostController::class, 'destroy'])->middleware('auth')->name('posts.destroy');

//route to login with github
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    // $user->token
});


