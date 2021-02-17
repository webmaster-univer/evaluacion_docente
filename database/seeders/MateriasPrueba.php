<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MateriasPrueba extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            for ($i=1; $i <=4 ; $i++) { 

    		DB::table('materias')->insert([
            'descripcion' => Str::random(10),
            'alumno_id' => $i,
            'grupo_id' => $i,
            'docente_id' => 1,
        	]);
        	   DB::table('materias')->insert([
            'descripcion' => Str::random(10),
            'alumno_id' => $i,
            'grupo_id' => $i,
            'docente_id' => 2,
        	]);
        	  DB::table('materias')->insert([
            'descripcion' => Str::random(10),
            'alumno_id' => $i,
            'grupo_id' => $i,
            'docente_id' => 3,
        	]);
        	   DB::table('materias')->insert([
            'descripcion' => Str::random(10),
            'alumno_id' => $i,
            'grupo_id' => $i,
            'docente_id' => 4,
        	]);
    	}
	}
}
