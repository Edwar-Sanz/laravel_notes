- las rutas Las rutas son responsables de mapear las URL 
  a acciones específicas dentro de la aplicación. 
  se ubican en la carpeta /routes

- El orden de la rutas importan

  para mostrar las rutas
  php artisan route::list muestra las rutas

<?php
// rutas en laravel:

  Route::get("/algo", function(){
    return "algo";
  });

  Route::post("/algo", function(){
    return "algo";
  });

// parámetros en url:

  // parámetros obligatorio:

  Route::get("saludo/{nombre}", function($nombre){
    return "saludo" . $nombre;
  });

  // parámetros no obligatorio:

  Route::get("saludo/{nombre?}", function($nombre = "invitado"){
    return "saludo" . $nombre;
  });


// name rutes:

  Route::get("/contactanos", function(){
    return "sección de contactos";
  })->name("contaco");

  // al hacer referencia a la ruta se una la
  // referencia al name, así:

  //. route("contaco") . apuntará a la ruta /contactanos
  Route::get("/", function(){
    echo "<a href = '" . route("contaco") ."'> click aquí y contactanos </a> ";
  });


?>