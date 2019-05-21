<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laboratorio;
use App\Paciente;
use Illuminate\Support\Facades\Auth;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $laboratorios = Laboratorio::all();
        $pacientes = Paciente::all();
        return view('laboratorio.index',compact('laboratorios','pacientes'));
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
        $laboratorio = new Laboratorio;
        $laboratorio->nombre = $request->nombre;
        $laboratorio->direccion = $request->direccion;
        $laboratorio->trabajo = $request->trabajo;
        $laboratorio->prueba = $request->prueba;
        $laboratorio->finalizacion = $request->finalizacion;
        $laboratorio->A_C = $request->A_C;
        $laboratorio->saldo = $request->saldo;
        $laboratorio->responable = $request->responsable;
        $laboratorio->fecha = $request->fecha;
        $laboratorio->hora = $request->hora;
        $laboratorio->paciente_id = $request->paciente_id;
        $laboratorio->user_id = Auth::user()->id;
        $laboratorio->save();

        return redirect('laboratorios');
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
