<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Diente;
use App\Anamnesis;
use App\Tratamiento;
use App\Pago;
use App\Odontologo;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Odontograma;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    public function tratamientos($id)
    {
        $paciente = Paciente::where('id',$id)->first();
        // return $paciente;
        $tratamientos = Tratamiento::where('paciente_id',$id)->get();
       
         return view('tratamiento.index',compact('paciente','tratamientos'));
    }

    public function crear($id){
        $paciente = Paciente::find($id);
        $dientes = Diente::where('paciente_id',$paciente->id)->select('id','nro_pieza')->get();
        $odontologos = Odontologo::all();
        return view('tratamiento.edit',compact('paciente','dientes','odontologos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request->all();
        $tratamiento = new Tratamiento();
        $tratamiento->paciente_id = $request->paciente_id;
        $tratamiento->odontologo_id = $request->odontologo_id;
        $tratamiento->user_id = Auth::user()->id;
        $tratamiento->costo_tratamiento = $request->costo_tratamiento;
        //odontopediatria
        $tratamiento->anestesia = $request->anestesia;
        $tratamiento->colaborador = $request->colaborador?true:false;
        //corigias
        $tratamiento->exodoncia = $request->exodoncia;
        $tratamiento->descripcion_cirugia = $request->descripcion_cirugia;
        //ortodoncia
        $tratamiento->fecha_ortodoncia = $request->fecha_ortodoncia;
        $tratamiento->higiene_dental = $request->higiene_dental;
        $tratamiento->descripcion_ortodoncia = $request->descripcion_ortodoncia;
        //implantes
        $tratamiento->diagnostico = $request->diagnostico;
        $tratamiento->planificacion = $request->planificacion;
        $tratamiento->fecha_cirugia = $request->fecha_cirugia;
        $tratamiento->hora = $request->hora;

        //rehabilitacion
        $tratamiento->impresiones_preliminares = $request->impresiones_preliminares?true:false;
        $tratamiento->impresiones_trabajo = $request->impresiones_trabajo?true:false;
        $tratamiento->prueba_metal = $request->prueba_metal?true:false;
        //endodoncia
        $tratamiento->radiografia = $request->radiografia;
        $tratamiento->descripcion_endodoncia = $request->descripcion_endodoncia;
        
        $tratamiento->save();
        $dientes = json_decode($request->dientes);
        $ids = [];
          
        foreach($dientes as $diente)
        {
            array_push($ids,$diente->id);
        }
        $tratamiento->dientes()->sync($ids);
        
        return redirect('paciente/tratamientos/'.$tratamiento->paciente_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
