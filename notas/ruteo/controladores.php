-Los controladores en Laravel son clases 
  que contienen métodos que manejan la lógica 
  de la aplicación para una determinada ruta.

  para crear un controlador:
  (en consola) php artisan make:controller myController

  *por defecto se ubican en app/http/controllers

- para conectar la ruta a un controlador
  se crea el controlador con sus métodos
  se importa el controlador en las rutas


  make:controller [options] [--] <name>
    
//-----------------------------------------------------------------------------------------
  --invokable genera una clase de controlador invocable 
    es decir, que se puede llamar al controlador como 
    si fuera una función, en lugar de tener que llamar 
    a un método específico dentro del controlador.

  php artisan make:controller MiControlador --invokable
  
  <?php
  //-------------controlador------------------------------ 
  class myControler extends Controller
  {
    public function __invoke(Request $request)
    {
      $nombre = "Jhon";
      return view('myView')->with("nombre", $nombre);
    }
  }
  
  //-------------ruta------------------------------------
  // en la ruta se invoca el controlador
  Route::get('/mi-ruta', 'myControler')->name("miRuta");

  

  ?>

//-----------------------------------------------------------------------------------------

El comando php artisan make:controller -r en Laravel genera 
un controlador con todos los métodos de recursos (resourceful methods). 
Esto significa que se generan los métodos comunes utilizados 
para realizar operaciones CRUD (crear, leer, actualizar y eliminar) 
en un recurso específico.


index: Este método se encarga de mostrar una lista de recursos. 
  ejemplo para mostrar el listado de proyectos de un portafolio 

create: Este método muestra un formulario para crear un nuevo 
  recurso. Normalmente, se utiliza para renderizar una vista con 
  campos de entrada donde el usuario puede ingresar los datos 
  necesarios por ejemplo para crear un nuevo registro para el 
  listado de proyectos de un portafolio .

store: Este método se utiliza para procesar el formulario 
  enviado por el método "create" y almacenar el nuevo recurso 
  en la base de datos. Aquí es donde se lleva a cabo la lógica 
  de validación y creación del registro en sí, de lo enviado 
  por el metodo create.

show: Este método muestra los detalles de un recurso específico. 
Por lo general, se utiliza para mostrar una página que muestra 
información detallada sobre un registro en particular a traves del ID. 
por ejemplo mostrar un único proyecto de un listado de proyectos de un portafolio


edit: Este método muestra un formulario para editar un recurso 
  existente. Normalmente, se utiliza para renderizar una vista 
  con campos de entrada prellenados con los valores 
  actuales del registro que se va a editar.

update: Este método se utiliza para procesar el formulario enviado 
  por el método "edit" y actualizar el recurso en la base de datos. 
  Aquí es donde se lleva a cabo la lógica de validación y actualización 
  del registro.

destroy: Este método se utiliza para eliminar un recurso específico 
  de la base de datos. Puedes personalizar la lógica para encontrar 
  y eliminar el registro según tus necesidades.

<?php
  // las rutas quedarían mas o menos de esta forma
  Route::get ('/recurso',          'MiControlador@index'  )->name( 'recurso.index'); // MiControlador@index indica controlador "MiControlador" y accede al método "index"
  Route::post('/recurso',          'MiControlador@store'  )->name( 'recurso.store');
  Route::get ('/recurso/create',   'MiControlador@create' )->name('recurso.create');
  Route::get ('/recurso/{id}',     'MiControlador@show'   )->name(  'recurso.show');
  Route::put ('/recurso/{id}',     'MiControlador@update' )->name('recurso.update');
  Route::delete('/recurso/{id}',   'MiControlador@destroy')->name('recurso.destroy');
  Route::get ('/recurso/{id}/edit','MiControlador@edit'   )->name(  'recurso.edit');

  //otra forma de mapear las rutas es con resource
  //primer parámetro es el nombre de la ruta y el segundo el controlador
  Route::resource("recurso","MyController") 


?>
//-----------------------------------------------------------------------------------------
php artisan make:controller --api crea los controladores para una api
igual que con -r solo que excluye los metodos create, edit que generan 
las vistas de los formularios

  Route::apiResource("recurso","MyController") 