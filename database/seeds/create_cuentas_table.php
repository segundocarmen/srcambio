<?php

use Illuminate\Database\Seeder;
use App\Models\Cuentas;
class create_cuentas_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cuenta1 = new Cuentas();
        $cuenta1->nombre='BCP SOLES';
        $cuenta1->nro_cuenta='19435125404005';
        $cuenta1->banco_id=1;
        $cuenta1->users_id=1;
        $cuenta1->save();
    }
}
