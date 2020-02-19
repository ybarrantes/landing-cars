<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsuariosCampaniaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_campania', function (Blueprint $table) {
            $table->bigIncrements('id');
            // TODO: revisar tipo de dato: considero que debe ser de tipo string ya que podrian
            //       existir registros de personas extranjeras; por esta razon prefiero realizar
            //       el control de la validacion en el modelo y no dejar cerrado el campo en la base de datos
            $table->string('cedula', 20)->unique();
            $table->string('nombre');
            $table->string('apellido');
            // TODO: revisar tipo de dato
            $table->string('celular', 20);
            $table->string('correo')->nullable();
            $table->unsignedInteger('ciudad_id');
            $table->boolean('habeas_data')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

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
        Schema::dropIfExists('usuarios_campania');
    }
}
