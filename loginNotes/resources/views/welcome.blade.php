<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido</h1>


    {{--  auth y guest permite manejar el contenido que se va a 
          renderizar dependiendo si está logueado o no    
    --}}
    @auth
        <p>solo visible para usuario logeados</p>
        <form action="{{route("logout")}}" method="post">
        @csrf
            <button type="submit">logout</button>
        </form>

        <p>logueado como:
            {{Auth::user()->email}}
        </p>

    @endauth
    
    @guest
    <p>solo visible para invitados</p>   

    <a href="{{route("register")}}">registro</a>
    <a href="{{route("login")}}">login</a>

    @endguest

    <a href="{{route("privatepage")}}">privatepage</a>
    <a href="{{route("rutaprivada")}}">rutaprivada</a>
</body>
</html>