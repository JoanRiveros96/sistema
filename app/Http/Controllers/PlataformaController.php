<?php

namespace App\Http\Controllers;

use App\Models\Plataforma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PlataformaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['plataformas']=Plataforma::paginate(5);
        return view('Plataforma.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Plataforma.create');
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
            'TipoInfo'=>'required',
            'Titulo'=>'required',
            'Descripcion'=> 'required|string',
            'Link'=> 'required|string',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosPlataforma=request()->except('_token'); 
                
        $datosPlataforma['Usuario'] = auth()->user()->id; 
        
        
        Plataforma::create($datosPlataforma);
        
       
       return redirect('plataforma')->with('mensaje','Plataforma agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plataforma  $plataforma
     * @return \Illuminate\Http\Response
     */
    public function show(Plataforma $plataforma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plataforma  $plataforma
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $plataforma = Plataforma::findOrFail($id);

        return view('Plataforma.edit',compact('plataforma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plataforma  $plataforma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Auditoria = [];
        
        $Titulo =DB::table('plataformas')->select('Titulo')->where('id','=',$id)->first();
        $campos=[
            
            
            'Descripcion'=> 'required|string',
            'Link'=> 'nullable|string',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];      
        

        $this->validate($request,$campos,$mensaje);

        $datosPlataforma=request()->except(['_token','_method']);
        $datosPlataforma['Usuario'] = auth()->user()->id; 

        Plataforma::where('id','=',$id)->update($datosPlataforma);

        $Auditoria['detalles'] = "Titulo: ". $Titulo->{'Titulo'} ." Descripcion: ". $datosPlataforma['Descripcion'] ." Link" . $datosPlataforma['Link'];

        
        $auditoria = new AuditoriaController();

        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "plataformas";
        $detalleAuditoria['id_tabla']= (int)$id;
        $detalleAuditoria['tipo_modificacion']= "Actualizacion";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('plataforma')->with('mensaje','Plataforma modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plataforma  $plataforma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       
        $plataforma = Plataforma::findOrFail($id);
        Plataforma::where('id','=',$id)->update(['Activo'=>0]);
        $auditoria = new AuditoriaController();
        $Auditoria = [];
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "plataformas";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Eliminacion";
        $Auditoria['detalles'] = "Ha sido eliminada la informacion en plataformas, cambio de estado Activo a cero (0)";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('plataforma')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
        
    }
}
