<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materias;
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
         ->select('materias.descripcion','docentes.nombre_completo AS docente')
         ->get();
 
        return view('dashboard',compact('materias'));
    }
}
