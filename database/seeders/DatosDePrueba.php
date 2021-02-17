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
            'name' => 'Fulanito '.Str::random(5),
            'email' => '00000000'.$i.'@alumnos.com',
            'username' => '00000000'.$i,
            'password' => Hash::make('123456'),
            'alumno_id' => $i,
        ]);
    		DB::table('alumnos')->insert([
            'id_pwc' => '00000000'.$i,
            'nombre_completo' => 'Fulanito '.Str::random(5),
            'plantel_id' => $i,
            'grupo_id' =>$i,
            'grado_id' => $i,
            'nivel_grado_id' => $i,
        ]);
             DB::table('docentes')->insert([
            'nombre_completo' => 'Fulanito Docente'.Str::random(5),
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
        DB::table('preguntas')->insert([
            'descripcion' => "¿Como fue la Carta Descriptiva a Moodle?",
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Subió carta descriptiva antes del inicio de clases",
            'pregunta_id' => '1',
            'puntos' => '5',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Subió carta descriptiva entre primera y segunda clase",
            'pregunta_id' => '1',
            'puntos' => '3',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Subió carta descriptiva después de la 2da clase",
            'pregunta_id' => '1',
            'puntos' => '1',
        ]);
        DB::table('preguntas')->insert([
            'descripcion' => "¿Como fue la calidad de Planeación Didáctica?",
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Elaboró planeación didáctica modelo",
            'pregunta_id' => '2',
            'puntos' => '5',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Elaboró su planeación bien pero de manera parcial o con algunos errores",
            'pregunta_id' => '2',
            'puntos' => '3',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Elaboró su planeación con algunos aspectos correctos pero muy incompleto y con muchos errores",
            'pregunta_id' => '2',
            'puntos' => '1',
        ]);
        DB::table('preguntas')->insert([
            'descripcion' => "Exámenes",
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Aplicó evaluación en tiempo y forma",
            'pregunta_id' => '3',
            'puntos' => '5',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Debe mejorar evaluación en aspectos clave",
            'pregunta_id' => '3',
            'puntos' => '3',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Aplicó en destiempo y/o con serias deficiencias",
            'pregunta_id' => '3',
            'puntos' => '1',
        ]);
        DB::table('preguntas')->insert([
            'descripcion' => "Diversidad Metodológica",
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Integró una gran cantidad de recursos didácticos",
            'pregunta_id' => '4',
            'puntos' => '5',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Maneja suficiente diversidad metodológica pero le faltan recursos clave",
            'pregunta_id' => '4',
            'puntos' => '3',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Maneja muy poca diversidad en sus estrategias de  enseñanza",
            'pregunta_id' => '4',
            'puntos' => '1',
        ]);
        DB::table('preguntas')->insert([
            'descripcion' => "Manejo de Plataforma Digital",
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Utilizó ampliamente la plataforma digital",
            'pregunta_id' => '5',
            'puntos' => '5',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Hizo un uso adecuado de la plataforma pero limitadamente",
            'pregunta_id' => '5',
            'puntos' => '3',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "No usó la plataforma o solo en cuestiones muy básicas",
            'pregunta_id' => '5',
            'puntos' => '1',
        ]);
        DB::table('preguntas')->insert([
            'descripcion' => "Academias y Capacitaciones",
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Asistió y participó activamente en todas las sesiones",
            'pregunta_id' => '6',
            'puntos' => '5',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Sólo asistió activamente a la mitad de las sesiones",
            'pregunta_id' => '6',
            'puntos' => '3',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Asistió a menos de la mitad de las sesiones",
            'pregunta_id' => '6',
            'puntos' => '1',
        ]);
    }
}
