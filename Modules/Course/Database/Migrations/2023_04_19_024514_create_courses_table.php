<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            # En: Name of the course
            # Es: Nombre de curso
            $table->string('name')
                ->comment('Nombre del curso');

            # En: Description of the course
            # Es: Descripcion del curso
            $table->string('description')
                ->comment('Descripcion del curso');

            # En: Course start date
            # Es: fecha de inico del curso
            $table->date('start_date')
                ->comment('Fecha de inicio del curso');

            # En: Course end date
            # Es: fecha de finalizacion del curso
            $table->date('end_date')
                ->comment('Fecha de finalizacion del curso');

            # En: Status field
            # Es: Campo de estado
            $table->boolean('status')
            ->comment('Campo de estado');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
