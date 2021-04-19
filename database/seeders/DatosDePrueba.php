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
        /*
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
        */
        DB::table('preguntas')->insert([
            'descripcion' => "Objetivos del Curso",
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "El curso cumplió el programa establecido y además logró profundizar",
            'pregunta_id' => '1',
            'puntos' => '5',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "El curso cumplió con algunos de los objetivos pero otros no",
            'pregunta_id' => '1',
            'puntos' => '3',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "El curso no cumplió con los objetivos que fueron establecidos",
            'pregunta_id' => '1',
            'puntos' => '1',
        ]);
        DB::table('preguntas')->insert([
            'descripcion' => "Didáctica de Clase",
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "El curso tuvo una gran riqueza en su impartición al integrar una amplia gama de técnicas didácticas",
            'pregunta_id' => '2',
            'puntos' => '5',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Hubo muchos elementos valiosos en la didáctica pero también hubo  problemas",
            'pregunta_id' => '2',
            'puntos' => '3',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "La mecánica de clase resultó muy monótona y carente de técnica didáctica",
            'pregunta_id' => '2',
            'puntos' => '1',
        ]);
        DB::table('preguntas')->insert([
            'descripcion' => "La Evaluación",
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "La evaluación fue clara, consistente y justa. Siempre hubo apertura y retroalimentación",
            'pregunta_id' => '3',
            'puntos' => '5',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "La evaluación fue clara y justa pero no estoy de acuerdo con algunos elementos",
            'pregunta_id' => '3',
            'puntos' => '3',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Nunca quedaron claros los criterios para evaluar y se manejó con retrasos y confusiones constantes",
            'pregunta_id' => '3',
            'puntos' => '1',
        ]);
        DB::table('preguntas')->insert([
            'descripcion' => "Contenidos",
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Los contenidos vistos en clase son muy pertinentes a la carrera y claves en mi formación profesional",
            'pregunta_id' => '4',
            'puntos' => '5',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Los contenidos vistos en clase fueron importantes pero hubo temas sin sentido o pertinencia",
            'pregunta_id' => '4',
            'puntos' => '3',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "Los contenidos vistos en clase fueron importantes pero hubo temas sin sentido o pertinencia",
            'pregunta_id' => '4',
            'puntos' => '1',
        ]);
        DB::table('preguntas')->insert([
            'descripcion' => "Ambiente de trabajo en clase",
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "El grupo es muy participativo y existe un ambiente de respeto y trabajo",
            'pregunta_id' => '5',
            'puntos' => '5',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "El grupo es disperso. No hay mucha participación pero se puede trabajar adecuadamente",
            'pregunta_id' => '5',
            'puntos' => '3',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "El grupo es muy descontrolado. Falta mucho orden y disciplina",
            'pregunta_id' => '5',
            'puntos' => '1',
        ]);
        DB::table('preguntas')->insert([
            'descripcion' => "Aspectos Formales",
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "¿Se subió el programa de la materia en tiempo a la plataforma al inicio del curso?",
            'pregunta_id' => '6',
            'puntos' => '0',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "¿Te quedaron claras las reglas y los criterios de la clase?",
            'pregunta_id' => '6',
            'puntos' => '0',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "¿El maestro faltó dos o más veces a la clase?",
            'pregunta_id' => '6',
            'puntos' => '0',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "¿El maestro fue puntual en llegar a clase?",
            'pregunta_id' => '6',
            'puntos' => '0',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "¿El docente lleva un control de la asistencia?",
            'pregunta_id' => '6',
            'puntos' => '0',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "¿El maestro resolvió adecuadamente mis dudas?",
            'pregunta_id' => '6',
            'puntos' => '0',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "¿Se aprovecharon los recursos de la plataforma Moodle?",
            'pregunta_id' => '6',
            'puntos' => '0',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "¿Se fomentó la investigación en Internet?",
            'pregunta_id' => '6',
            'puntos' => '0',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "¿Existió diversidad de recursos digitales en la implementación de clase? ",
            'pregunta_id' => '6',
            'puntos' => '0',
        ]);
        DB::table('respuestas')->insert([
            'descripcion' => "¿Existió un ambiente de cordialidad y respeto?",
            'pregunta_id' => '6',
            'puntos' => '0',
        ]);
    }
}
