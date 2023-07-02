<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // el método up define los cambios que deseas aplicar a la base de datos
    public function up(): void
    {
        // estructura de la tabla
        // si ya se ejecutaron las migraciones y se desea modificar esta tabla, 
        // es necesario crear una nueva migración con los cambios y así no perder datos
        // si los datos no importan se modifica acá directamente y se ejecuta php artisan migrate:fresh
        Schema::create('tablaproductos', function (Blueprint $table) {
            $table->id();
            $table->string('columnaproductos')->unique();
            $table->timestamps();
        });
    }

    // el método "down" especifica cómo revertir esos cambios en caso de deshacer la migración.
    public function down(): void
    {
        Schema::dropIfExists('tablaproductos');
    }
};
