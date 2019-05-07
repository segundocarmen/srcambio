<?php

use Illuminate\Database\Seeder;
use App\Models\Bancos;
class create_bancos_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banco1 = new Bancos();
        $banco1->nombre='BANCO DE CRÉDITO DEL PERÚ';
        $banco1->nombreCorto='BCP';
        $banco1->save();

        $banco1 = new Bancos();
        $banco1->nombre='BANCO CONTINENTAL';
        $banco1->nombreCorto='BBVA';
        $banco1->save();
    }
}
