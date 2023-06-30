$fillable: Especifica una lista blanca de atributos 
  que se pueden asignar masivamente. Solo los atributos 
  enumerados aquí se permitirán en la asignación masiva.

$guarded: Especifica una lista negra de atributos que 
  no se pueden asignar masivamente. Los atributos 
  enumerados aquí no se permitirán en la asignación masiva.

//------------------------------------------------------------

  suponiendo un modelo user:


  es importante estableciendo reglas de validación 
  en el controlador y utilizando el método validate() 
  de Laravel antes de guardar los datos, para proteger
  la aplicación contra posibles ataques de asignación 
  masiva no autorizados.
<?php 
//------------------modelo------------------------------
class UserModell extends Model
{
  // así de pueden definir los atributos asignables masivamente:
  protected $fillable = ['name', 'email', 'password'];
}

//------------------controlador--------------------------
class UserController extends Controller
{
  public function index(){

  //dependiento de cada caso se puede elegir hacer alguna
  //de estas acciones con la req

    // Obtener todos los datos del formulario
    $data = request()->all(); 

    //obtener solo algunos datos
    $onlyData = request()->only("name", "email");


    $fields = request()->validate([
      "name"=>"required", 
      "email"=>"required"
    ]);

    //despues de hacer las validaciones ya se puede usar el modelo
    Usermodell::create($fields);

  }
}

?>