
@extends('layouts.app') {{-- vista traida de layouts/app --}}


@section("titulo", "Inicio") {{-- si es texto plano, la section tiene esta sintaxis --}}

@section('page') {{-- la section('contenido') hará render en el espacio o @yield('contenido') --}}
		
<h3>Inicio</h3>

@endsection

