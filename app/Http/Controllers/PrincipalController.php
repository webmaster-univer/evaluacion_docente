<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use App\Models\Preguntas;
use Illuminate\Http\Request;
use App\Models\Respuestas;
use App\Models\EvaluacionContestada;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PrincipalController extends Controller
{
    public function index()
    {


        $materias = DB::table('alumnos')
        ->leftjoin('grupos', function ($join){
            $join->on('grupos.id', '=', 'alumnos.grupo_id');
        })
         ->leftjoin('materias', function ($join){
            $join->on('materias.grupo_id', '=', 'grupos.id');
        })
           ->leftjoin('users', function ($join){
            $join->on('users.alumno_id', '=', 'alumnos.id');
        })
             ->leftjoin('docentes', function ($join){
            $join->on('docentes.id', '=', 'materias.docente_id');
        })
         ->Where('users.alumno_id',Auth::user()->alumno_id)
         ->select('materias.descripcion','docentes.nombre_completo AS docente','materias.contestada','materias.id')
         ->get();

        return view('dashboard',compact('materias'));
    }
    public function store(Request $request)
    {

    }
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*$preguntas = DB::table('preguntas')
            ->leftjoin('respuestas', function ($join){
            $join->on('preguntas.id', '=', 'respuestas.pregunta_id');
        })->select('preguntas.descripcion AS pregunta','respuestas.descripcion AS respuesta',
                'respuestas.puntos','preguntas.id AS preguntaID','respuestas.id AS respuestaID','respuestas.pregunta_id')
            ->get();
        */
        $respuestas = new Respuestas();
        $respuestas = $respuestas->all();
        $preguntas = new Preguntas();
        $preguntas = $preguntas->all();



        $docente = DB::table('materias')
            ->leftjoin('docentes', function ($join){
            $join->on('docentes.id', '=', 'materias.docente_id');
        })
            ->select('docentes.nombre_completo','materias.descripcion','materias.id','materias.contestada')
            ->where('materias.id',$id)->first();

        if($docente->contestada == 1)
        {
            return redirect('principal');
        }
        else
        {
        return view('evaluar',compact('preguntas','docente','respuestas'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $materias = Materias::find($id);
        $materias ->contestada = 1;
        $materias ->save();

        $resultados = new EvaluacionContestada();
        $resultados ->pregunta1 = $request->pregunta1;
        $resultados ->pregunta2 = $request->pregunta2;
        $resultados ->pregunta3 = $request->pregunta3;
        $resultados ->pregunta4 = $request->pregunta4;
        $resultados ->pregunta5 = $request->pregunta5;
        $resultados ->pregunta6 = $request->pregunta6;
        $resultados ->alumno_id = $materias->alumno_id;
        $resultados ->grupo_id	 = $materias->grupo_id;
        $resultados ->docente_id = $materias->docente_id;
        $resultados ->total = $request->pregunta1 + $request->pregunta2 + $request->pregunta3 + $request->pregunta4 + $request->pregunta5 + $request->pregunta6;
        $resultados ->save();


        return redirect('principal');

    }


}
