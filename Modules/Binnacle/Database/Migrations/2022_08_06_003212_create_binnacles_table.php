<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * En: Log Table Migration.
 * Es: Migración de la tabla de bitácora.
 */
return new class extends Migration
{
    /**
     * En: Run the migrations.
     * Es: Ejecuta las migraciones.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('binnacles', function (Blueprint $table) {
            
            # En: Primary key of the table.
            # Es: Llave primaria de la tabla.
            $table->id();
            
            # En: Reference table in the database.
            # Es: Tabla de referencia en la base de datos.
            $table->string('table')
                ->comment('Reference table in the database.');
            
            # En: Table primary key.
            # Es: Clave principal de la tabla.
            $table->string('primary_key')
                ->comment('Table primary key.');
            
            $table->enum('type_action', [
                    'created',
                    'updated',
                    'deleted',
                    'restored',
                    'forceDeleted'
                ])
                ->comment('Type of action on the table.');
            
            # En: Change made by user.
            # Es: Cambio realizado por el usuario.
            $table->foreignId('user_id')
                ->comment('Change made by user.')
                ->constrained();
            
            # En: Column data being modified in the table.
            # Es: Los datos de la columna se están modificando en la tabla.
            $table->json('data')
                ->comment('Column data being modified in the table.');
            
            # En: Modified date and time.
            # Es: Fecha y hora modificada.
            $table->timestamp('modified')
                ->comment('Modified date and time.');
            
        });
    }

    /**
     * En: Reverse the migrations.
     * Es: Invertir las migraciones.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('binnacles');
    }
};
