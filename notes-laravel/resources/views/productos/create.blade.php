<form action="{{route("productos/almacenar")}}" method="post"> 
  @csrf

  <button>
    <a href="{{route("productos")}}"> Volver a productos </a>
  </button><br>

  {{-- 
    old() permite que en caso de error de validación en un
    formulario, no tener que llenarlo todo, el value=""
    será lo que ya había escrito
  --}}
  <label for="newProduct">Nombre del nuevo producto:</label><br>
  <input type="text" name="newProduct" value="{{old("newProduct")}}">

  {{-- 
    $errors @errors y $message permite acceder a los mensajes de error
    $errors->all();
  --}}
  @error('newProduct') {{-- recive el name="" del input --}}
  <br><small>{{$message}}</small>
  @enderror
  {{-- otra forma de hacerlo --}}
  {!! $errors->first("newProduct", '<br><small>:message</small>') !!}

  <br>
  <button type="submit">Crear</button>

</form>