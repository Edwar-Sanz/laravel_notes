<h1> NOTAS BLADE </h1>

{{-- para imprimir una variable se usa doble llave --}}
  {{-- esto imprime la varibable $nombre si no está definida imprime "invitado"  --}}
  <p>saludos {{$nombre ?? "invitado"}}</p> {{-- la variable llega del controlado, se pasó con with("nombre", $nombre); --}}

{{-- para usar una plantilla  --}}

  {{-- ingresar al .bladle que va a usar la platilla y usar extends  --}}
  {{-- la barra de navegación se muestra en todas las páginas --}}
  {{-- ruta 1 --}}
    @extends("nav"); {{-- -- extends asume que "nav" es un .blade.php --}}
    
    @section('content'); {{-- section que se va a mostrar en el yield --}}
        <h1>ruta 1</h1>
    @endsection

  {{-- ruta 2 --}}
    @extends("nav"); 
    
    @section('content'); {{-- section que se va a mostrar en el yield --}}
        <h1>ruta 2</h1>
    @endsection


  {{-- ingresar al .bladle platilla y usar yield  --}}
  {{-- muestra el contenido dependiendo la ruta en este yield --}}
    <nav>barra de navegación</nav>
      @yield("content"); 

{{--  --}}
{{-- include es otra directiva para llamar un .blade dentro de otro --}}
@include("myView"); {{-- esto busca /resources/views/myView.blade.php --}}



{{-- estructuras de control con blade --}}

  {{-- forma 1 --}}
  <?php
    foreach ($array as $item) {
      echo "<li>" . $item["value"] . "</li>";
    }
  ?>

  {{-- forma 2 --}}
  <?php foreach ($array as $item): ?>
      <li>{{ $item["value"]}} </li>;
  <?php endforeach ?>

  {{-- forma 3 --}}
  @foreach ($array as $item)
      <li>{{ $item["value"]}} </li>
  @endforeach ?>

  {{-- de la misma forma se usan otras estructuras de control --}}
  @if ($variable)
      <p>true</p>
  @else
    <p>false</p>
  @endif

  {{-- 
    
    existen diferentes directivas para 
    recorrer arrys y hacer validaciones como:
    
    @isset
    @forelse
    @empty
    @for
    @while
    
  --}}




