<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>@yield("titulo")</title> {{-- render de la section titulo --}} 

</head>
<body>
  <h1>Notas App</h1>


  @include('partials.nav') {{-- vista traida de partials/nav --}}


  @if(session('flash_message'))
      <div>Aviso:  ***** {{session('flash_message')}} *****</div>
  @endif

{{-- yield crea un espacio para renderizar 
  un contenido en este caso hace render de 
  la section("page")--}}
  @yield('page') 

</body>
</html>