<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\UserAuthController;
use App\Http\Controllers\API\Auth\AdminAuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user/login', [UserAuthController::class, 'login']);
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('register',[UserAuthController::class,'register']);
// Only for users
Route::middleware(['auth:sanctum', 'type.user'])->group(function () {
    //   Route::get('/users/orders', [OrderController::class, 'orders']);
});
// Only for admins
Route::middleware(['auth:sanctum', 'type.admin'])->group(function () {
    // Route::get('/admins/categories', [CategoryController::class, 'orders']);
});
