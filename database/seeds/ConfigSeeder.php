<?php

use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
           'empresa'=>null,
           'telefono'=>null,
           'direccion'=>null,
           'rif'=> null,
           'iva'=>null,
           'descuento'=>null,
           'moneda'=>null
        ]);
    }
}
