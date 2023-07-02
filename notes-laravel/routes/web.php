<?php

use App\Http\Controllers\ProductControler; //importar el controlador
use Illuminate\Support\Facades\Route;

//-------------NOTAS:------------------
// el orden de las rutas es importante
// por lo general las rutas que reciben
// parámetros se ponen al final


//----------------------------rutas---------------------------------------
// cuando se accede a la ruta "/"
// retorna la vista "inicio"
// view() por defecto busca en resource/views/nombreVista
// solo es necesario especificar la ruta si hay subcarpetas
Route::get('/', function () {
    return view('inicio');
});

// Route::view util cuando no se requiere de lógica,solo mostrar una vista
Route::view("/contacto", "contacto")->name("contacto");
Route::view("/nosotros", "nosotros")->name("nosotros");

//----------------------------rutas productos-----------------------------------------------------
// ProductControler::class es el controlador y fue importado en la parte superior
// index se refiere al nombre del método en el controlador
Route::get("/productos", 
    [ProductControler::class, "index"])->name("productos");

//método create muestra un formulario para crear nuevo producto
Route::get("/productos/crear", 
    [ProductControler::class, "create"])->name("productos/crear");

//método store guarda info de form en la db
Route::post("/productos/almacenar", 
    [ProductControler::class, "store"])->name("productos/almacenar");

//método show decibe un id por la url para poder mostrar el detalle del producto
Route::get("/productos/{id}", 
    [ProductControler::class, "show"])->name("productos{id}");
    
//método edit decibe un id por la url para mostrar un fomr y editar el producto
Route::get("/productos/{id}/editar", 
    [ProductControler::class, "edit"])->name("productos/{id}/editar");
    
//método update procesa el  form y actualiar el producto
Route::patch("/productos/{id}/actualizar", 
    [ProductControler::class, "update"])->name("productos/{id}/actualizar");

//método delete decibe un id por la url para eliminar el producto
Route::delete("/productos/{id}/borrar", 
    [ProductControler::class, "destroy"])->name("productos/{id}/borrar");


//----------------------------otras rutas-----------------------------------------------------
Route::view("/componentes", "componentes")->name("componentes");