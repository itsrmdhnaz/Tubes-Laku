<?php

use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\Auth\LoginController;
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

Route::post('login', [LoginController::class, 'loginApi']);
Route::get('order/{id}', [OrderController::class, 'show'])->middleware('auth:sanctum');
Route::get("items", [OrderController::class, 'allItems'])->middleware("auth:sanctum");
// Route::post("orderDetails/{id}", [OrderController::class, 'orderDetails'])->middleware("auth.sanctum");

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
