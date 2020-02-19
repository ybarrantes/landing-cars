<?php

use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartamentosTableSeeder::class);
        $this->call(CiudadesTableSeeder::class);
    }
}
