<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(create_users_table::class);
        $this->call(create_paises_table::class);
        $this->call(create_bancos_table::class);
        $this->call(create_cuentas_table::class);
        $this->call(create_srcambio_datos_table::class);
        $this->call(create_tipo_cambio_table::class);
    }
}
