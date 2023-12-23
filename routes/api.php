<?php

use App\Http\Controllers\ApiAuthContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login',[ApiAuthContoller::class,'login']);

Route::post('register',[ApiAuthContoller::class,'register']);

Route::post('logout',[ApiAuthContoller::class,'logout'])->middleware('auth:sanctum');
// اتحقق اذا المسسستخدم مسجل دخول او لا 