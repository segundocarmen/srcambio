<?php

use Illuminate\Database\Seeder;
use App\Models\Paises;
class create_paises_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banco1 = new Paises();
        $banco1->nombre='Perú';
        $banco1->codigo='PE';
        $banco1->save();
    }
}
