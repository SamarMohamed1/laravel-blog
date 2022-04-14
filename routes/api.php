<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//route to signup
Route::post('/signup',[UserController::class,'signup']);

//route to login
Route::post('/login',[UserController::class,'login']);

//route to get the user posts
Route::get('/user-posts', [PostController::class ,'userPosts'])->middleware('auth:sanctum');

//route to get all posts
Route::get('/posts',[PostController::class,'allPosts'])->middleware('auth:sanctum');

//route to get update post
Route::get('/update-posts/{post}', [PostController::class ,'update'])->middleware('auth:sanctum');

//route to add new post
Route::post('/Add-posts', [PostController::class ,'store'])->middleware('auth:sanctum');


// Route::post('/sanctum/token', function (Request $request) {
//     $request->validate([
//     'email' => 'required|email',
//     'password' => 'required',
//     'device_name' => 'required',
//     ]);

//     $user = User::where('email', $request->email)->first();

//     if (! $user || !Hash::check($request->password, $user->password)) {
//         throw ValidationException::withMessages([
//             'email' => ['The provided credentials are incorrect.'],
//             ]);
//             }

//             return $user->createToken($request->device_name)->plainTextToken;
//            });
