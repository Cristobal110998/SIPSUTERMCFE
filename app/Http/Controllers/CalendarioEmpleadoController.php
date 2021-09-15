<?php

namespace App\Http\Controllers;

use App\Models\calendarioEmpleado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarioEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('evento.calendarioEmpleado');
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
        request()->validate(calendarioEmpleado::$rules);
        $evento=calendarioEmpleado::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\calendarioEmpleado  $calendarioEmpleado
     * @return \Illuminate\Http\Response
     */
    public function show(calendarioEmpleado $calendarioEmpleado)
    {
        //
        $calendarioEmpleado = calendarioEmpleado::all();
        return response()->json($calendarioEmpleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\calendarioEmpleado  $calendarioEmpleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $calendarioEmpleado = calendarioEmpleado::find($id);
        $calendarioEmpleado->start = Carbon::createFromFormat('Y-m-d H:i:s',$calendarioEmpleado->start)->format('Y-m-d');
        $calendarioEmpleado->end = Carbon::createFromFormat('Y-m-d H:i:s',$calendarioEmpleado->end)->format('Y-m-d');
        return response()->json($calendarioEmpleado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\calendarioEmpleado  $calendarioEmpleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, calendarioEmpleado $calendarioEmpleado)
    {
        //
        request()->validate(calendarioEmpleado::$rules);
        $calendarioEmpleado->update($request->all());
        return response()->json($calendarioEmpleado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\calendarioEmpleado  $calendarioEmpleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $calendarioEmpleado = calendarioEmpleado::find($id)->delete();
        return response()->json($calendarioEmpleado);
    }
}