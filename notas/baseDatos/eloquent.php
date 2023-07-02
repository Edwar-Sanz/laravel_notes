<?php
//algunos ejemplos de los métodos más utilizados en Eloquent, el ORM (Object-Relational Mapping) de Laravel:

//all(): Recupera todos los registros de una tabla en la base de datos.
  $users = User::all();

//get() ejecutar una consulta y recuperar los resultados de la base de datos
  $user = User::get();
  $users = User::where('age', '>', 18)->get();
  $users = User::select('name', 'email')->get();

  
//find($id): Recupera un registro por su ID.
  $user = User::find(1);


//create(array $data): Crea un nuevo registro en la base de datos.
  $user = User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => bcrypt('secret')
  ]);

  // o también:
  $usuario = new User;
  $usuario->nombre = 'John Doe';
  $usuario->email = 'john@example.com';
  $usuario->password = bcrypt('secretpassword');
  $usuario->save();


//update(array $data): Actualiza los valores de un registro existente.
  $user = User::find(1);
  $user->name = 'New Name';
  $user->save();


//delete(): Elimina un registro de la base de datos.
  $user = User::find(1);
  $user->delete();

//where($column, $operator, $value): Agrega una cláusula WHERE a la consulta.
  $users = User::where('age', '>', 18)->get();

//orderBy($column, $direction): Ordena los resultados de la consulta.
  $users = User::orderBy('name', 'asc')->get();

//count(): Devuelve el número de registros que coinciden con la consulta.
  $count = User::where('active', true)->count();


?>