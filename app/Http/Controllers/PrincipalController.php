<?php

namespace App\Http\Controllers;

use App\Models\Preguntas;
use Illuminate\Http\Request;
use App\Models\Respuestas;
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
            ->select('docentes.nombre_completo','materias.descripcion')
            ->where('materias.id',$id)->first();

        return view('evaluar',compact('preguntas','docente','respuestas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


    }


}
