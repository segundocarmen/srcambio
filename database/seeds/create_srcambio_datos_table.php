<?php

use Illuminate\Database\Seeder;
use App\Models\Srcambio;
class create_srcambio_datos_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos = new Srcambio();
		$datos->nombre = 'FÁBRICA DE SOFTWARE DEL PERÚ';
		$datos->ruc = '20509734411';
		$datos->banco_id = 1;
		$datos->nro_cuenta = '12365151561545';
		$datos->save();
    }
}
