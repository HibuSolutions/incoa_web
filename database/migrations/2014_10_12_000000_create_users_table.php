<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('nivels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nameNivel');
            $table->timestamps();
        });


        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('apellidos');
            $table->unsignedBigInteger('nivel_id')->nullable();
            $table->foreign('nivel_id')->references('id')->on('nivels');
            $table->text('dui_tutor');
            $table->text('nie')->nullable();
            $table->text('sexo')->nullable();
            $table->text('foto')->nullable();
            $table->integer('edad')->nullable();
            $table->text('tel')->nullable();
            $table->text('tel_Responsable')->nullable();
            $table->text('direccion')->nullable();
            $table->text('datos_salud')->nullable();
            $table->string('email');
            $table->string('password');
            $table->text('pass');
            $table->integer('excelencia')->nullable();
            $table->integer('responsable')->nullable();
            $table->integer('estudioso')->nullable();
            $table->integer('puntual')->nullable();
            $table->integer('colaborador')->nullable();
            $table->integer('deportista')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('nivels');
    }
}
