<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert([
            ['codigo'=>5,'nombre'=>'antioquia'],
            ['codigo'=>8,'nombre'=>'atlántico'],
            ['codigo'=>11,'nombre'=>'bogotá, d.c.'],
            ['codigo'=>13,'nombre'=>'bolívar'],
            ['codigo'=>15,'nombre'=>'boyacá'],
            ['codigo'=>17,'nombre'=>'caldas'],
            ['codigo'=>18,'nombre'=>'caquetá'],
            ['codigo'=>19,'nombre'=>'cauca'],
            ['codigo'=>20,'nombre'=>'cesar'],
            ['codigo'=>23,'nombre'=>'córdoba'],
            ['codigo'=>25,'nombre'=>'cundinamarca'],
            ['codigo'=>27,'nombre'=>'chocó'],
            ['codigo'=>41,'nombre'=>'huila'],
            ['codigo'=>44,'nombre'=>'la guajira'],
            ['codigo'=>47,'nombre'=>'magdalena'],
            ['codigo'=>50,'nombre'=>'meta'],
            ['codigo'=>52,'nombre'=>'nariño'],
            ['codigo'=>54,'nombre'=>'norte de santander'],
            ['codigo'=>63,'nombre'=>'quindio'],
            ['codigo'=>66,'nombre'=>'risaralda'],
            ['codigo'=>68,'nombre'=>'santander'],
            ['codigo'=>70,'nombre'=>'sucre'],
            ['codigo'=>73,'nombre'=>'tolima'],
            ['codigo'=>76,'nombre'=>'valle del cauca'],
            ['codigo'=>81,'nombre'=>'arauca'],
            ['codigo'=>85,'nombre'=>'casanare'],
            ['codigo'=>86,'nombre'=>'putumayo'],
            ['codigo'=>88,'nombre'=>'archipiélago de san andrés, providencia y santa catalina'],
            ['codigo'=>91,'nombre'=>'amazonas'],
            ['codigo'=>94,'nombre'=>'guainía'],
            ['codigo'=>95,'nombre'=>'guaviare'],
            ['codigo'=>97,'nombre'=>'vaupés'],
            ['codigo'=>99,'nombre'=>'vichada']
        ]);
    }
}
