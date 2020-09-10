<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'usuario' => 'admin',
            'password' => bcrypt('admin'),
            'cargo' => 1,
            'nombres'=> 'Desarrollador'
        ]);




        

       }
}
