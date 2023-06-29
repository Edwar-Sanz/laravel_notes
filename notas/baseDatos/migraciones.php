Migración:

Controla y modifica la estructura de la base de datos de tu aplicación.
Define los cambios en el esquema de la base de datos utilizando código PHP.
Se utiliza para crear tablas, modificar columnas, agregar índices, definir claves foráneas, entre otros.

//--------------------------------------------------------------

- las migraciones permiten gestionar la base de datos desde laravel
las migraciones se guardan en /database/migrations

-para crear migraciones:
  php artisan make:migration "nombre de la migration" --create="nombreTabla"

-para ejecutar las migraciones:
  php artisan migrate

-para deshacer:
  php artisan migrate:rollback

//--------------------------------------------------------------

las migraciones tienes dos metodos
El método "up" define los cambios que deseas aplicar a la base de datos
el método "down" especifica cómo revertir esos cambios en caso de deshacer la migración.


  php artisan make:migration create_users_table --create=users
  

<?php
class CreateUsersTable extends Migration
{
    public function up()
    {
      Schema::create('users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamps();
      });
    }
    public function down()
    {
      Schema::dropIfExists('users');
    }
}
?>

si queremos ejecutar la migración:
  php artisan migrate

para editar la migracion se agrega --table="tabla a modificar"
ejemplo:
  php artisan make:migration edit_users_table --table=users
