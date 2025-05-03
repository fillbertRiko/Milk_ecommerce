<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Đây là nơi đăng ký các API routes cho ứng dụng của bạn. Các route
| này được load bởi RouteServiceProvider với tiền tố 'api' và được gắn
| middleware 'api' mặc định.
|
*/

// Ví dụ: Route để lấy thông tin người dùng đã xác thực
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//admin
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//user
Route::middleware('auth:api')->group(function () {
    Route::get('user', [UserController::class, 'index']);
    Route::get('user/{id}', [UserController::class, 'show']);
    Route::put('user/{id}', [UserController::class, 'update']);
    Route::delete('user/{id}', [UserController::class, 'destroy']);
});

