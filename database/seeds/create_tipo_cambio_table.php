<?php

use Illuminate\Database\Seeder;
use App\Models\TipoCambio;
class create_tipo_cambio_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cambio1 = new TipoCambio();
		$cambio1->paises_id = 1;
		$cambio1->de = 'Soles';
		$cambio1->a = 'Dólares';
		$cambio1->compra = 3.274;
		$cambio1->venta = 3.304;
		$cambio1->save();
    }
}
