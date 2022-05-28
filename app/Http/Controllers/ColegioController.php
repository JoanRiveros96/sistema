<?php

namespace App\Http\Controllers;

use App\Models\Colegio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ColegioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['colegios']=Colegio::JOIN('users','colegios.Usuario','=','users.id')
        ->select('users.name','colegios.*')
        ->paginate(10);
        return view('Colegio.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Colegio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $campos=[
            
            'TipoInfo'=>'required',
            'Informacion'=> 'required|string',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            'Link'=> 'nullable|string',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosColegio=request()->except('_token'); 

        if($request->hasFile('Imagen')){
            $datosColegio['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        else{
            $datosColegio['Imagen'] = '';
        }
        
        $datosColegio['Usuario'] = auth()->user()->id; 
        
        
        Colegio::create($datosColegio);
        
       
       return redirect('colegio')->with('mensaje','Informacion del Colegio agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colegio  $colegio
     * @return \Illuminate\Http\Response
     */
    public function show(Colegio $colegio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Colegio  $colegio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $colegio = Colegio::findOrFail($id);

        return view('Colegio.edit',compact('colegio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Colegio  $colegio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Auditoria = [];
        $imagen = DB::table('colegios')->select('Imagen')->where('id','=',$id)->first();
        $tipoinfo =DB::table('colegios')->select('TipoInfo')->where('id','=',$id)->first();
        $campos=[
            'Informacion'=> 'required|string',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            'Link'=> 'nullable|string',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        if($request->hasFile('Imagen')){
            $campos=['Imagen' =>'max:10000|mimes:jpeg,png,jpg'];
            //$mensaje=['Imagen.required'=>'La foto es requerida'];
        }
        $this->validate($request,$campos,$mensaje);
        $datosColegio=request()->except(['_token','_method']);
        $datosColegio['Usuario'] = auth()->user()->id; 
        if($request->hasFile('Imagen')){
            $colegio = Colegio::findOrFail($id);
            Storage::delete('public/'.$colegio->Imagen);
            $datosColegio['Imagen']=$request->file('Imagen')->store('uploads','public');
            $Auditoria['detalles'] = "TipoInfo: ". $tipoinfo->{'TipoInfo'} ." Informacion: ". $datosColegio['Informacion'] ." Ubicacion Imagen: ". $datosColegio['Imagen'] ."Link: ". $datosColegio['Link'];
        }else{
            $Auditoria['detalles'] = "TipoInfo: ". $tipoinfo->{'TipoInfo'} ." Informacion: ". $datosColegio['Informacion'] ." Ubicacion Imagen: ". $imagen->{'Imagen'} ."Link: ". $datosColegio['Link'];

        }
        Colegio::where('id','=',$id)->update($datosColegio);

        $auditoria = new AuditoriaController();
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "colegios";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Actualizacion";
        
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('colegio')->with('mensaje','Informacion del Colegio modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colegio  $colegio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $colegio = Colegio::findOrFail($id);
        Colegio::where('id','=',$id)->update(['Activo'=>0]);

        $auditoria = new AuditoriaController();
        $Auditoria = [];
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "colegios";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Eliminacion";
        $Auditoria['detalles'] = "Ha sido eliminada la informacion en colegios, cambio de estado Activo a cero (0)";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('colegio')->with('mensaje','Informacion del Colegio borrada');
    }
}
