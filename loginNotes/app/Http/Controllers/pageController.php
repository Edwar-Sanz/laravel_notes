<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller{

    //para proteger una ruta desde el controlador
    // se debe crear un constructor y llamar el
    // método middleware que extiende de los
    // controladores
    public function __construct(){ //se crea el constructor
        $this->middleware("auth",  //se utiliza el middleware "auth"
            ["only"=> "indexPage"]); //se pasa el array de métodos que usarán el middleware

            // ["except"=>["metodo1", "metodo2", ]] para hacer lo contrario a "only"
        }


    public function indexPage(){ // método que se protege con auth
        return view("privatepage");
    }
}
