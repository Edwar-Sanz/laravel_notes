@extends('layouts.app') 

@section("titulo", "Nosotros")

@section('page') 
		
  {{ $prueba[0]->columnaprueba }}<br/>
  <h3>Productos</h3>

  {{--  ------------crear producto------------ --}}
  <button>
    <a href="{{route("productos/crear")}}"> crear producto </a>
  </button>
  
  {{--  ------------renderizar todos los productos------------ --}}
  @foreach($productos as $producto)
    <p>
      {{--  ------------interacción con productos------------ --}}
      {{-- las rutas tienen como segundo parámetro 
        el id para interactuar con cada producto --}}
      <a href="{{route("productos{id}", $producto->id)}}"> {{ $producto->columnaproductos }} </a>
    
      <button>
        {{-- <a href="#"> editar producto</a> --}}
        <a href="{{route("productos/{id}/editar", $producto->id)}}"> editar producto</a>
      </button>

        
      {{-- necesario crear formularios para poder ejecutar metodos diferentes a get y post --}}
      <form 
        action="{{route("productos/{id}/borrar", $producto->id)}}"
        method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" > borrar producto </button>
      </form>
      
    </p>
  @endforeach
  

@endsection