<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;


//Auth::routes();


Route::get('usuario_test', function() {
    $user = new User;
    $user->name = 'Marcelo';
    $user->email = 'marcelorojas07@gmail.com';
    $user->password = Hash::make('mrojasd');  // Usar Hash::make para encriptar la contraseña
    $user->save();

    return 'Usuario creado con éxito';
});

//Auth::routes();


Route::get('/', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('valida_login', [App\Http\Controllers\LoginController::class, 'valida_login'])->name('valida_login');
Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'inicio'])->name('inicio');

    //Productos
    Route::get('listado_productos', [App\Http\Controllers\ProductosController::class, 'listado_productos'])->name('listado_productos');
    Route::get('modal_productos', [App\Http\Controllers\ProductosController::class, 'modal_productos'])->name('modal_productos');

    //Regiones
    Route::get('regiones', [\App\Http\Controllers\RegionesController::class, 'regiones'])->name('regiones');

});


