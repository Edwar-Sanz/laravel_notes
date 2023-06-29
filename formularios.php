<!-- formulario.blade.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Formulario</title>
</head>
  <body>
    <!-- de esta forma se puede acceder a los errores -->
    @if($errors->any())
      @foreach( $errors->all() as $error )
        <p>{{$error}}</p>
      @endforeach
    @endif

    <!-- importante cada input debe tener la propiedad name 
      ya que con esta se van a manejar otros valores como
      old() first() validate() -->
    <!-- importante poner @csrf en cada formulario -->
    <form action="/formulario/procesar" method="post">
      @csrf
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre" required><br><br>
      {!! $errors->first("name", <p> :message </p>) !!}  <!-- esta es otra forma de acceder a error -->


      <!-- value="{{old('email')}}" guarda el valor del campo por si un valor falla no tener que volver a llenar todo -->
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="{{old('email')}}" required><br><br>

      <button type="submit">Enviar</button>
    </form>
  </body>
</html>


//----------------------------------RUTAS:-----------------------------------------------------
<?php
Route::get('/formulario', 'FormularioController@index');
Route::post('/formulario/procesar', 'FormularioController@procesar');
?>

//---------------------------------controladores-----------------------------------------------
php artisan make:controller FormularioController
<?php
class FormularioController extends Controller
{
  public function index() // primer método que retorna el .blade
  {
    return view('formulario'); 
  }

  // (Request $request) Request contiene los datos enviados por el cliente
  // $request es la variable que permite acceder al objeto
  // otra forma es usar request() para acceder al objeto directamente
  public function procesar(Request $request) // segundo método, el que procesa la req
  {

    //como request() permite acceder a la req directamente también se puede usar
    // para hace validaciones
    // validate recive un array con la valicadiones
    // visitar laravel.com/docs/validation
    request()->validate([
      "name" => "requiered",
      "email"=> ["requiered", "email"]
    ]);



    // Procesar los datos recibidos del formulario
    $nombre = $request->input('nombre');
    $email = $request->input('email');

    // Hacer algo con los datos (por ejemplo, guardarlos en la base de datos)
    
    // Retornar una respuesta
    return response()->json(['mensaje' => 'Datos procesados correctamente']);
  }
}
?>