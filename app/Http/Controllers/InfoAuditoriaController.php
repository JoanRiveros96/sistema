<?php

namespace App\Http\Controllers;

use App\Models\info_auditoria;
use Illuminate\Http\Request;

class InfoAuditoriaController extends Controller
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
    public function store(Array $request)
    {
        
        info_auditoria::create($request);
        //return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\info_auditoria  $info_auditoria
     * @return \Illuminate\Http\Response
     */
    public function show(info_auditoria $info_auditoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\info_auditoria  $info_auditoria
     * @return \Illuminate\Http\Response
     */
    public function edit(info_auditoria $info_auditoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\info_auditoria  $info_auditoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, info_auditoria $info_auditoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\info_auditoria  $info_auditoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(info_auditoria $info_auditoria)
    {
        //
    }
}
