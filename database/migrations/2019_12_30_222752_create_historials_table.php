<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nombre');
            $table->text('apellido');
            $table->text('nie');
            $table->text('nivel');
            $table->integer('user_id');
            $table->text('seccion');
            $table->decimal('lenguaje')->nullable();
            $table->decimal('matematica')->nullable();
            $table->decimal('ciencias')->nullable();
            $table->decimal('sociales')->nullable();
            $table->decimal('ingles')->nullable();
            $table->decimal('fisica')->nullable();
            $table->decimal('opv')->nullable();
            $table->decimal('seminario')->nullable();
            $table->decimal('tecnologia_comercial')->nullable();
            $table->decimal('informatica')->nullable();
            $table->decimal('creatividad')->nullable();
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
        Schema::dropIfExists('historials');
    }
}
