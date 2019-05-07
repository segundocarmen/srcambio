<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transacciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('montoEnvia', 10, 2);
            $table->decimal('montoRecibe', 10, 2);
            $table->integer('tipo_cambio_id')->unsigned();
            $table->integer('banco_id')->unsigned()->nullable();
            $table->integer('cuenta_id')->unsigned()->nullable();
            $table->integer('users_id')->unsigned();
            $table->integer('estado')->default(1);
            $table->string('codigo_operacion',100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('transacciones', function (Blueprint $table) {
            $table->foreign('banco_id')->references('id')->on('banco');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('tipo_cambio_id')->references('id')->on('tipo_cambio');
            $table->foreign('cuenta_id')->references('id')->on('cuenta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}