<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- $title es una propiedad del componente o una variable
    a la que se puede acceder desde las vistas con "x-slot" --}}
    <title> titulo - {{ $titulo ?? 'Title' }} </title>
    
  </head>
  <body>
  <h1>Notas App</h1>
  <p>{{ $titulo ?? 'Title' }}</p>

  <p>suma: {{ $suma ?? '0' }}</p>



{{-- con los componetes se utilizan los slots --}}
{{-- $slot es una variable reservada, en esta se renderiza el contenido--}}
{{ $slot }}

  
</body>
</html>