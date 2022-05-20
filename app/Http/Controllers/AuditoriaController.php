<?php

namespace App\Http\Controllers;

use App\Models\auditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\InfoAuditoriaController;

class AuditoriaController extends Controller
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
    public function store(Array $auditoria, Array $detalleAuditoria)

    { 
        
        $detalle = new InfoAuditoriacontroller();
        $id = DB::table('INFORMATION_SCHEMA.TABLES')
        ->select('AUTO_INCREMENT AS ID')
        ->where('TABLE_SCHEMA','=','coldivin_sistema')
        ->where('TABLE_NAME','=','auditorias')
        ->first();
        
        $detalleAuditoria['id_auditoria']= $id->{'ID'};
        auditoria::create($auditoria);
        $detalle->store($detalleAuditoria);
         
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function show(auditoria $auditoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function edit(auditoria $auditoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, auditoria $auditoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(auditoria $auditoria)
    {
        //
    }
}
