<nav>
  <ul>
    <li><a href="/">Inicio   </a></li>						     			{{-- ruta llamada directamente --}}
    <li><a href="{{route("contacto")}}">Contacto</a></li>   {{-- ruta llamada con referencia al nombre, con sintaxis blade --}} 
    <li><a href="<?=route("nosotros")?>">Nosotros</a></li>  {{-- ruta llamada con referencia al nombre, con sintaxis php --}}
    <li><a href="{{route("productos")}}">Productos</a></li>  
  </ul>
</nav>

{!! "<script> console.log('hola mundo'); </script>" !!} {{--a diferencia de las dobles llaves esta sintaxis no escapa el contenido html--}}
