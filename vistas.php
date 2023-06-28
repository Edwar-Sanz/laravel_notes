- las vistas son un archivo .blade.php que definen 
  la estructura y presentación de la interfaz de usuario.

  se encuentran en /resources/views

<?php 

  // la función view() retorna un archivo .blade
  // no es necesario especificar la ruta ya que
  // asume que se encontrará en resource/views/nombreVista.blade
  Route::get("/", function(){
    return view("home");
  })->name("home");

  // pasar variables a las vistas:
  // usamos with:
  Route::get("/", function(){
    $nombre = "Jhon"; // se define la variable
    return view("home")->with("nombre", $nombre); // se pasa el nombre de la variable y el valor
  })->name("home");

  // otra forma es pasa la variable como un array
  Route::get("/", function(){
    $nombre = "Jhon"; // se define la variable
    return view("home", ["nombre"=>$nombre]); // se pasa el nombre de la variable y el valor
  })->name("home");


  // se puede reducir el código usando el método view
  Route::view("/", "home"); // si va a la ruta "/" devuelve la vista: "home"
  // se le pueden pasar variables en un array y darle un nombre a la ruta de la misma forma
  Route::view("/", "home", ["nombre"=>$nombre])->name("home");




?>