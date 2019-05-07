<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cuentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',190);
            $table->string('nro_cuenta',190);
            $table->integer('banco_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('cuenta', function (Blueprint $table) {
            $table->foreign('banco_id')->references('id')->on('banco');
            $table->foreign('users_id')->references('id')->on('users');
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
