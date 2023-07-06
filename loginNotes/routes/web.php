<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


// para proteger una ruta se usa el middleware auth
// este inspeccióna la petición y verifica si el usuario
// está autenticado, en cado de no estarlo por defecto
// retorna a una ruta login
Route::view('/rutaprivada', "rutaPrivada")->middleware("auth")->name("rutaprivada");

//otra forma de proteger rutas es directamente
//desde el controlador
Route::get('/privatepage', [pageController::class, "indexPage"])->name("privatepage");


Route::view('/register', "register")->name("register");
Route::post('/register', [RegisteredUserController::class, "store"])->name("register");

Route::view('/login', "login")->name("login");
Route::post('/login', [AuthenticatedSessionController::class, "store"])->name("login");
Route::post('/logout', [AuthenticatedSessionController::class, "destroy"])->name("logout");



