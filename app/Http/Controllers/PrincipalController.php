<?php

namespace App\Http\Controllers;

use App\Models\Grupos;
use App\Models\Materias;
use App\Models\Preguntas;
use Illuminate\Http\Request;
use App\Models\Respuestas;
use App\Models\User;
use App\Models\AlumnosGrupos;
use App\Models\Alumnos;
use Illuminate\Support\Facades\Hash;
use App\Models\EvaluacionContestada;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PrincipalController extends Controller
{
    public function index()
    {


        $materias = DB::table('alumnos')
        ->leftjoin('alumnos_grupos', function ($join){
            $join->on('alumnos_grupos.alumno_id', '=', 'alumnos.id');
        })
         ->leftjoin('materias', function ($join){
            $join->on('materias.grupo', '=', 'alumnos_grupos.grupo');
        })
            ->where('materias.alumno',Auth::user()->name)
         ->select('materias.descripcion','materias.docente AS docente','materias.contestada','materias.id')
            ->distinct()
         ->get();

        $materiasContestadas = Materias::where('alumno',Auth::user()->name)->where('contestada' , 1)->count();
        $finalizo = 0;
        if ($materias->count() == $materiasContestadas)
        {
            $finalizo = 1;
        }
        return view('dashboard',compact('materias','finalizo'));
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
            $join->on('docentes.nombre_completo', '=', 'materias.docente');
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
        $resultados ->pregunta7 = $request->pregunta7;
        $resultados ->pregunta8 = $request->pregunta8;
        $resultados ->pregunta9 = $request->pregunta9;
        $resultados ->pregunta10 = $request->pregunta10;
        $resultados ->pregunta11 = $request->pregunta11;
        $resultados ->pregunta12 = $request->pregunta12;
        $resultados ->pregunta13 = $request->pregunta13;
        $resultados ->pregunta14 = $request->pregunta14;
        $resultados ->alumno_id = Auth::user()->id;
        $resultados ->plantel_id = $materias->plantel_id;
        $resultados ->grupo	 = $materias->grupo;
        $resultados ->materia	 = $materias->descripcion;
        $resultados ->docente = $materias->docente;
        $resultados ->total = $request->pregunta1 + $request->pregunta2 + $request->pregunta3 + $request->pregunta4 + $request->pregunta5 + $resultados ->pregunta6 +$request->pregunta7 + $request->pregunta8 + $request->pregunta9 + $request->pregunta10 + $request->pregunta11 + $resultados ->pregunta12 + $resultados ->pregunta13 + $resultados ->pregunta14;
        $resultados ->observaciones = $request->observaciones;
        $resultados ->save();


        return redirect('principal');

    }

    public function CrearUsuarios()
    {
        $alumnos = new Alumnos();
        $alumnos = $alumnos->where('id','>',4981)->get();
        
        foreach ($alumnos as  $alumno)
        {
            $usuario = new User();
            $usuario->name = $alumno->nombre_completo;
            $usuario->username = $alumno->id_pwc;
            $usuario->email = $alumno->id_pwc."@alumnos.univer-gdl.edu.mx";
            $usuario->password =Hash::make($alumno->curp);
            $usuario->alumno_id = $alumno->id;
            $usuario->save();
           
        }
        
        return "Listo";


    }
    public function AgregarIds()
    {
        $alumnos = new AlumnosGrupos();
        $alumnos = $alumnos->whereNull('alumno_id')->get();

        foreach ($alumnos as $alumno)
        {

            $cambio = AlumnosGrupos::where('id_pwc',$alumno->id_pwc)->get();
            foreach ($cambio as $cambio){
                $usuario = Alumnos::where('id_pwc',$cambio->id_pwc)->first();
                $cambio->alumno_id = $usuario->id;
                $cambio->save();
            }

        }


    }
    public function AgregarIdsGrupos()
    {
        $alumnos = new AlumnosGrupos();
        $alumnos = $alumnos->whereNull('grupo_id')->get();

        foreach ($alumnos as $alumno)
        {

            $cambio = AlumnosGrupos::whereNull('grupo_id')->get();
            foreach ($cambio as $cambio){
                $usuario = Grupos::where('descripcion',$cambio->grupo)->first();
                //dd($cambio);
                $cambio->grupo_id = $usuario->id;
                $cambio->save();
            }

        }


    }


}
