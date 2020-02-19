<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsuariosConcursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_concurso', function (Blueprint $table) {
            $table->bigIncrements('id');
            // TODO: revisar tipo de dato: considero que debe ser de tipo string ya que podrian
            //       existir registros de personas extranjeras, sin embargo se deja segun requerimiento
            $table->unsignedBigInteger('cedula')->unique();
            $table->string('nombre');
            $table->string('apellido');
            // TODO: revisar tipo de dato: considero que debe ser de tipo string
            //       sin embargo se deja segun requerimiento
            $table->unsignedBigInteger('celular');
            $table->string('correo')->nullable();
            $table->unsignedInteger('ciudad_id');
            $table->boolean('habeas_data')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();

            $table->foreign('ciudad_id')->references('id')->on('ciudades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_concurso');
    }
}
