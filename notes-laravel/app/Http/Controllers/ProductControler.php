<?php

namespace App\Http\Controllers;

use App\Models\ProductosModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


//----------------------------------------------------
// un método  public function __invoke()
// se usa en los controladores que solo
// van a realizar una acción
//----------------------------------------------------

class ProductControler extends Controller
{
//------------------------------render all products-----------------------------------------------------    
    //acá se especifica el nombre del método en este caso se llama index
    // en la ruta se importa el controlador y el metodo en un array
    public function index() {

        // DB::table permite acceder a una base de datos, util para cuando
        // ya se tiene una base de datos creada, por lo general se usan los modelos
        $prueba = DB::table("pruebatablaconeccion")->get();
    
        //es necesario importar el modelo para poder usarlo
        // el modelo reprecenta la tabla 
        $productos = ProductosModelo::get();


        // retornamos la vista de \resources\views\productos\index.blade.php
        return view("productos.index", [
            //
            "prueba" => $prueba,
            "productos"=>$productos
        
        ]);
    }

//-----------------------------render specific products--------------------------------
    // el método recibe de la url "/productos/{id}" la variable $id
    public function show(ProductosModelo $id){

        //buscamos un producto por su id
        $producto = ProductosModelo::find($id);

        // retornamos la vista de \resources\views\productos\show.blade.php
        // y le pasamos la variable con la info del producto
        return view("productos.show", ["producto"=>$producto]);
    }

//--------------------------show form to create product--------------------------------
    // el método recibe de la url "/productos/crear" la variable $id
    public function create(){
        // retornamos la vista de \resources\views\productos\create.blade.php
        return view("productos.create");
    }

//---------------------------save form create------------------------------------------
    // la clase Request o la función request() nos permite acceder
    // a lo que llega del formulario, 
    //$request->input("keyJson") permite acceder a un valor del objeto request
    public function store(Request $request){
        
        //validaciones
        $request->validate([
            "newProduct" => ["required", "min:4"] //newProduct es el atributo name="" en el form
        ]);

        // interacción con el modelo para crear el registro
        ProductosModelo::create(['columnaproductos' => $request->input("newProduct")]); //newProduct es el atributo name="" en el form
        
        // la session es util para enviar mensajes a las vistas
        // se define el nombre del mensaje y el mensaje
        session()->flash('flash_message', "Producto creado");

        
        return to_route("productos");
    }

//---------------------------show form to edit product---------------------------------
    public function edit(ProductosModelo $id){

        $producto = ProductosModelo::find($id);
        return view("productos.edit", ["producto"=>$producto]);
    }
//---------------------------process form edit------------------------------------------
   
    public function update(Request $request, $id){//recibimos la req, y de la ruta, el {id}
        
        $request->validate([
            "newProduct" => ["required", "min:4"]
        ]);

        $producto = ProductosModelo::find($id);
        $producto->columnaproductos = $request->input("newProduct");
        $producto->save();

        session()->flash('flash_message', "Producto actualizado");

        return to_route("productos"); 
    }

//---------------------------delete product--------------------------------------------
    public function destroy($id){

        $producto = ProductosModelo::find($id);
        $producto->delete();
        
        session()->flash('flash_message', "Producto eliminado");
        return to_route("productos");
    }
}