<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatosDePrueba extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i <=4 ; $i++) { 
    		DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@alumnos.com',
            'username' => '00000000'.$i,
            'password' => Hash::make('123456'),
            'alumno_id' => $i,
        ]);
    		DB::table('alumnos')->insert([
            'id_pwc' => '00000000'.$i,
            'nombre_completo' => Str::random(10),
            'plantel_id' => $i,
            'grupo_id' =>$i,
            'grado_id' => $i,
            'nivel_grado_id' => $i,
        ]);
             DB::table('docentes')->insert([
            'nombre_completo' => Str::random(10),
        ]); 
          DB::table('grados')->insert([
            'descripcion' => Str::random(10),
        ]);
          DB::table('grupos')->insert([
            'descripcion' => Str::random(10),
        ]);    DB::table('planteles')->insert([
            'descripcion' => Str::random(10),
        ]);
          
    	}

             
    }
}
