<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['socials']=Social::JOIN('users','socials.Usuario','=','users.id')
        ->select('users.name','socials.*')
        ->paginate(10);
        return view('Social.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Social.create');
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
        $campos=[
            
            'TipoRed'=>'required|string',
            'Link'=> 'required|string',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosSocial=request()->except('_token');        
        $datosSocial['Usuario'] = auth()->user()->id; 
        
        
        Social::create($datosSocial);
        
       
       return redirect('social')->with('mensaje','Red Social agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $social = Social::findOrFail($id);

        return view('Social.edit',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Auditoria = [];
        $red =DB::table('socials')->select('TipoRed')->where('id','=',$id)->first();
        $campos=[
            
            'Link'=> 'required|string',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];


        $this->validate($request,$campos,$mensaje);

        $datosSocial=request()->except(['_token','_method']);
        $datosSocial['Usuario'] = auth()->user()->id; 


        Social::where('id','=',$id)->update($datosSocial);

        
        
        
        $Auditoria['detalles'] = "Red Social: ".  $red->{'TipoRed'} ."Link: " . $datosSocial['Link'];
                
        $auditoria = new AuditoriaController();
        
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "socials";
        $detalleAuditoria['id_tabla']= (int)$id;
        $detalleAuditoria['tipo_modificacion']= "Actualizacion";
        $auditoria->store($Auditoria, $detalleAuditoria);
        
        return redirect('social')->with('mensaje','Red Social modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $social = Social::findOrFail($id);
        Social::where('id','=',$id)->update(['Activo'=>0]);
        $auditoria = new AuditoriaController();
        $Auditoria = [];
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "socials";
        $detalleAuditoria['id_tabla']= (int)$id;
        
        $detalleAuditoria['tipo_modificacion']= "Eliminacion";
        $Auditoria['detalles'] = "Ha sido eliminada la informacion en socials, cambio de estado Activo a cero (0)";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('social')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
        
    }
}
