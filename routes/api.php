<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


/*API Productos*/
Route::apiResource('productos', \App\Http\Controllers\ProductosAPIController::class, [
    'parameters' => ['productos' => 'producto']
]);
