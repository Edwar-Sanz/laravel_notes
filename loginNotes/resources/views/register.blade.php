<h1>registro</h1>

<form action="{{route("register")}}" method="post"> 
  @csrf

  <input type="text" name="name"  placeholder="name">
  <input type="email" name="email" placeholder="email" >
  <input type="password" name="password" placeholder="password" >
  <input type="password" name="password_confirmation" placeholder="password_confirmation">


  <br>
  <button type="submit">Registrar</button>

</form>