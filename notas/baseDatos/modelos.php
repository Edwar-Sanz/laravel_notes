Modelo:

- Representa la estructura y la lógica de negocio de 
  los datos en tu aplicación.

- Se utiliza para interactuar con la base de datos 
  y realizar operaciones CRUD (crear, leer, actualizar, eliminar).

- Define las relaciones entre modelos, como 
  relaciones uno a uno, uno a muchos o muchos a muchos.

- Puede contener lógica adicional, como métodos para realizar 
  cálculos, procesamiento de datos y validaciones.

- los modelos son una clase que representa una tabla en la base de datos
  
- eloquent es el (ORM) permite trabajar con sintaxis de php en vez de sql


//------------------------------------------------------------------------

para crear un modelo:
  php artisan make::model NombreModelo

el modelo representará la tabla con el nombre del modelo
en plurar y en minúsculas

  si el modelo se llama "User" usará la tabla "users"
  o se puede usar:

    protected $table = 'users';

//-----------------------------------------------------------

los modelos se encuentran en App/Models/
  se debe importar el modelo en el controlador

ejemplo:

 //---modelo-----
  <?php 
  //namespace App\Models;
  use Illuminate\Database\Eloquent\Model;

  class User extends Model
  {
    protected $table = 'users';
  }
  ?>
  //----controlador---------
  Supongamos un controlador llamado UserController.
  <?php

  //namespace App\Http\Controllers;

  // use App\Models\User; se importa el modelo
  use Illuminate\Http\Request;

  class UserController extends Controller
  {
    public function index(){
    // Obtener todos los usuarios
    $users = User::all();
    } 

    public function show($id){
      // Obtener un usuario por su ID
      $user = User::find($id);
    }

    public function store(Request $request){
      // Crear un nuevo usuario
      $user = new User;
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->save();
    }

    public function update(Request $request, $id){
      // Actualizar un usuario existente
      $user = User::find($id);
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->save();
    }

    public function destroy($id){
      // Eliminar un usuario
      $user = User::find($id);
      $user->delete();
    }
  }
?>