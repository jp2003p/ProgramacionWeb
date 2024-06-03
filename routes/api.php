<?php

use App\Http\Controllers\Api\FacturaController;
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

Route::get('/index', [FacturaController::class, 'index']);
Route::post('/store', [FacturaController::class, 'store']);
Route::put('/update', [FacturaController::class, 'update']);
Route::delete('/destroy/{id}', [FacturaController::class, 'destroy']);
 