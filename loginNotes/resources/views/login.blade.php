<h1>login</h1>

<form action="{{route("login")}}" method="post"> 
  @csrf

  <input type="email" name="email" placeholder="email" >
  <input type="password" name="password" placeholder="password" >
  <input type="checkbox" name="remember" >

  {!! $errors->first("email", '<br><small>:message</small>') !!}
  {!! $errors->first("password", '<br><small>:message</small>') !!}
  <br>
  <button type="submit">Login</button>

</form>