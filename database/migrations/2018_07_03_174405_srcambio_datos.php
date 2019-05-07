<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SrcambioDatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('srcambio_datos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',190);
            $table->string('ruc',190);
            $table->integer('banco_id')->unsigned();
            $table->enum('tipo_cuenta', array('Cuenta corriente', 'Cuenta de horros'));
            $table->string('nro_cuenta',190);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('srcambio_datos', function (Blueprint $table) {
            $table->foreign('banco_id')->references('id')->on('banco');
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
