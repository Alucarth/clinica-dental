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

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pacientes = Paciente::all();
        $odontologos = Odontologo::all();
        return view('paciente.index',compact('pacientes','odontologos'));
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
        $user = Auth::user();

         //para edicion del paciente
        if ($request->has('paciente_id')) {
            //
            $paciente = Paciente::where('id',$request->input('paciente_id'))->first();
            $is_new = false;
        }else{
            $paciente = new Paciente;
            $is_new =true;
        }

        //para registro del paciente
        $paciente->nombre = $request->input('nombre');
        $paciente->apellidos = $request->input('apellidos');
        $paciente->fecha_nacimiento =  Carbon::createFromFormat('d/m/Y',$request->fecha_nacimiento)->toDateString();
        $paciente->telefono = $request->input('telefono');
        $paciente->celular = $request->input('celular');
        $paciente->email = $request->input('email');
        $paciente->edad = $request->input('edad');
        $paciente->sexo = $request->input('sexo');
        $paciente->informacion_adicional = $request->input('informacion_adicional');
        $paciente->antecedente_enfermedad = $request->input('antecedente_enfermedad');
        $paciente->father_name = $request->input('father_name');
        $paciente->father_address = $request->input('father_address');
        $paciente->father_phone = $request->input('father_phone');
        $paciente->odontologo_id = $request->odontologo_id;
        $paciente->user_id = $user->id;
        // return $paciente;
        $paciente->save();

        if(!$is_new){
            return back()->withInput();
        }

        for ($i=11; $i <= 18 ; $i++) {
            # code...
            $diente = new Diente;
            $diente->nro_pieza = $i;
            $diente->paciente_id = $paciente->id;
            $diente->user_id = $user->id;
            $diente->vestibular = 0;
            $diente->distal = 0;
            $diente->mesial = 0;
            $diente->oclusal = 0;
            $diente->palatino = 0;

            $diente->save();

        }
        for ($i=21; $i <= 28 ; $i++) {
            # code...
            $diente = new Diente;
            $diente->nro_pieza = $i;
            $diente->paciente_id = $paciente->id;
            $diente->user_id = $user->id;
            $diente->vestibular = 0;
            $diente->distal = 0;
            $diente->mesial = 0;
            $diente->oclusal = 0;
            $diente->palatino = 0;
            $diente->save();
        }
        for ($i=31; $i <=38 ; $i++) {
            # code...
            $diente = new Diente;
            $diente->nro_pieza = $i;
            $diente->paciente_id = $paciente->id;
            $diente->user_id = $user->id;
            $diente->vestibular = 0;
            $diente->distal = 0;
            $diente->mesial = 0;
            $diente->oclusal = 0;
            $diente->palatino = 0;
            $diente->save();
        }
        for ($i=41; $i <=48 ; $i++) {
            # code...
            $diente = new Diente;
            $diente->nro_pieza = $i;
            $diente->paciente_id = $paciente->id;
            $diente->user_id = $user->id;
            $diente->vestibular = 0;
            $diente->distal = 0;
            $diente->mesial = 0;
            $diente->oclusal = 0;
            $diente->palatino = 0;
            $diente->save();
        }

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Paciente::where('id',$id)->first();
        //$paciente = Paciente::find($id)->first();
        $dientes = Diente::where('id_paciente',$id)->get();

        $odontologos = Odontologo::all();
        return view('paciente.mostrar',compact('paciente','odontologs','dientes'));
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
    public function storeAnamnesis(Request $request)
    {
        // return $request->all();
        // return $request->id_paciente;

        if($request->has('id_anamnesis'))
        {

            $anamnesis = Anamnesis::where('id',$request->id_anamnesis)->first();
            $anamnesis->descripcion = $request->descripcion;
            $anamnesis->medico_cabecera = $request->medico_cabecera;
            $anamnesis->motivo_consulta = $request->motivo_consulta;
            $anamnesis->telefono_medico = $request->telefono_medico;
            $anamnesis->alergias = $request->alergias;
            $anamnesis->medicamentos = $request->medicamentos;
            $anamnesis->tratamientos_autorizados = $request->tratamientos_autorizados;
            $anamnesis->embarazo = $request->embarazo;
            $anamnesis->sangrado_excesivo = $request->sangrado_excesivo;
            $anamnesis->problema_cardiaco = $request->problema_cardiaco;
            $anamnesis->diabetes = $request->diabetes;
            $anamnesis->presion_baja = $request->presion_baja;
            $anamnesis->presion_alta = $request->presion_alta;
            $anamnesis->cancer = $request->cancer;
            $anamnesis->embarazo = $request->embarazo;
            $anamnesis->id_paciente = $request->id_paciente;
            $anamnesis->save();

            return back()->withInput();
        }

        $anamnesis = new Anamnesis;
        $anamnesis->descripcion = $request->descripcion;
        $anamnesis->medico_cabecera = $request->medico_cabecera;
        $anamnesis->motivo_consulta = $request->motivo_consulta;
        $anamnesis->telefono_medico = $request->telefono_medico;
        $anamnesis->alergias = $request->alergias;
        $anamnesis->medicamentos = $request->medicamentos;
        $anamnesis->tratamientos_autorizados = $request->tratamientos_autorizados;
        $anamnesis->embarazo = $request->embarazo;
        $anamnesis->sangrado_excesivo = $request->sangrado_excesivo;
        $anamnesis->problema_cardiaco = $request->problema_cardiaco;
        $anamnesis->diabetes = $request->diabetes;
        $anamnesis->presion_baja = $request->presion_baja;
        $anamnesis->presion_alta = $request->presion_alta;
        $anamnesis->cancer = $request->cancer;
        $anamnesis->embarazo = $request->embarazo;
        $anamnesis->id_paciente = $request->id_paciente;
        $anamnesis->save();

        return back()->withInput();
        // return  $anamnesis;
        // return $request->all();
    }

    public function storeTratamientos(Request $request)
    {
      //  return $request->id_tratamiento;

        if($request->has('id_tratamiento'))
        {
            $tratamiento = Tratamiento::where('id',$request->id_tratamiento)->first();
           // $tratamiento = new Tratamiento;
            $tratamiento->id_paciente = $request->id_paciente;
            $tratamiento->id_diente = $request->id_diente;
            $tratamiento->id_odontologo = Auth::user()->id_odontologo;
            $tratamiento->costo_tratamiento = $request->costo_tratamiento;
            $tratamiento->descripcion = $request->descripcion;
            $tratamiento->balance = $request->costo_tratamiento;
            $tratamiento->save();

            return back()->withInput();

        }
        $tratamiento = new Tratamiento;
        $tratamiento->id_paciente = $request->id_paciente;
        $tratamiento->id_diente = $request->id_diente;
        $tratamiento->id_odontologo = Auth::user()->id_odontologo;
        $tratamiento->costo_tratamiento = $request->costo_tratamiento;
        $tratamiento->descripcion = $request->descripcion;
        $tratamiento->balance = $request->costo_tratamiento;
        $tratamiento->save();




        return back()->withInput();
        // return $request->all();
    }

    public function storePagos(Request $request)
    {
        // return $request->id_pago;

        if($request->has('id_pago'))
        {
            $pago = Pago::where('id',$request->id_pago)->first();

            $pago->monto=$request->monto;
            $pago->descripcion = $request->descripcion;
            $pago->id_tratamiento = $request->id_tratamiento;
            $pago->id_paciente = $request->id_paciente;
            $pago->id_odontologo = Auth::user()->id_odontologo;

            $pago->save();


             return back()->withInput();
        }

        $pago = new Pago;

        $pago->monto=$request->monto;
        $pago->descripcion = $request->descripcion;
        $pago->id_tratamiento = $request->id_tratamiento;
        $pago->id_paciente = $request->id_paciente;
        $pago->id_odontologo = Auth::user()->id_odontologo;

        $pago->save();




            $tratamiento = Tratamiento::where('id',$request->id_tratamiento)->first();
            // $tratamiento->descripcion = 'haber si cambia';
            $tratamiento->balance = (int) $tratamiento->balance - (int) $pago->monto;
            $tratamiento->save();

            // return  $tratamiento;

         return back()->withInput();

    }

    public function historial($id)
    {
        $paciente = Paciente::where('id',$id)->first();
        $odontologos = Odontologo::all();
        $tratamientos = Tratamiento::where('paciente_id',$paciente->id)->get();
        // return $tratamientos;
        $tabla=array();
        foreach($tratamientos as $tratamiento)
        {
            array_push($tabla,array($tratamiento->created_at,$tratamiento->diagnostico,$tratamiento->odontologo->nombre,$tratamiento->costo_tratamiento));
        }
        return view('paciente.show',compact('paciente','odontologos','tabla'));
    }
    public function odontograma($id)
    {
        $paciente = Paciente::where('id',$id)->first();

        $dientes = Diente::where('paciente_id',$id)->get();

        return view('paciente.odontograma',array('paciente' => $paciente, 'dientes' => $dientes ));
    }
    public function anamnesis($id)
    {
        $paciente = Paciente::where('id',$id)->first();

          $anamnesis = Anamnesis::where('paciente_id',$id)->first();


        return view('paciente.anamnesis',array('paciente' => $paciente, 'anamnesis' => $anamnesis ));
    }

    public function tratamientos($id)
    {
         $paciente = Paciente::where('id',$id)->first();
        // return $paciente;
         $tratamientos = Tratamiento::where('paciente_id',$id)->get();

         return view('paciente.tratamientos',array('paciente' => $paciente, 'tratamientos' => $tratamientos ));
    }

    public function pagos($id)
    {
         $paciente = Paciente::where('id',$id)->first();

         $pagos = Pago::where('paciente_id',$id)->get();

         return view('paciente.pagos',array('paciente' => $paciente, 'pagos' => $pagos ));
    }




    public function reporte_historial($id)
    {
        return view('reportes.historial');
        return 'reporte view '.$id;
    }
}
