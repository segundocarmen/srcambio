<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoCambio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_cambio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paises_id')->unsigned();
            $table->string('de',20);
            $table->string('a',20);
            $table->decimal('compra', 10, 3);
            $table->decimal('venta', 10, 3);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('tipo_cambio', function (Blueprint $table) {
            $table->foreign('paises_id')->references('id')->on('paises');
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
