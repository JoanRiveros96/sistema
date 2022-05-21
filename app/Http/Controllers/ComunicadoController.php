<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ComunicadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['comunicados']=Comunicado::paginate(5);
        return view('Comunicado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Comunicado.create');
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
            'Fecha'=>'required|date',
            'Titulo'=>'required|string',
            'Contenido'=> 'required|string',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            'Link'=> 'nullable|string',
            
        

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Fecha.date'=> 'el :attribute debe ser una fecha',

        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosComunicado=request()->except('_token');
        

        if($request->hasFile('Imagen')){
            $datosComunicado['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        else{
            $datosComunicado['Imagen'] = '';
        }
        
        $datosComunicado['Usuario'] = auth()->user()->id; 
        
        
        Comunicado::create($datosComunicado);
        
       
       return redirect('comunicado')->with('mensaje','Comunicado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comunicado  $comunicado
     * @return \Illuminate\Http\Response
     */
    public function show(Comunicado $comunicado)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comunicado  $comunicado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comunicado = Comunicado::findOrFail($id);

        return view('Comunicado.edit',compact('comunicado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comunicado  $comunicado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Auditoria = [];
        $imagen = DB::table('comunicados')->select('Imagen')->where('id','=',$id)->first();
        $campos=[
            
            'Fecha'=>'required|date',
            'Titulo'=>'required|string',
            'Contenido'=> 'required|string',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            'Link'=>'nullable|string',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];

        if($request->hasFile('Imagen')){
            $campos=['Imagen' =>'max:10000|mimes:jpeg,png,jpg'];
            //$mensaje=['Imagen.required'=>'La foto es requerida'];
        }
        

        $this->validate($request,$campos,$mensaje);

        $datosComunicado=request()->except(['_token','_method']);
        $datosComunicado['Usuario'] = auth()->user()->id; 

        if($request->hasFile('Imagen')){
            $comunicado = Comunicado::findOrFail($id);
            Storage::delete('public/'.$comunicado->Imagen);
            $datosComunicado['Imagen']=$request->file('Imagen')->store('uploads','public');

            $Auditoria['detalles'] = "Fecha: ". $datosComunicado['Fecha'] ." Titulo: ". $datosComunicado['Titulo'] ." Contenido: ". $datosComunicado['Contenido'] ."Imagen: ". $datosComunicado['Imagen'];
        }else{
            $Auditoria['detalles'] = "Fecha: ". $datosComunicado['Fecha'] ." Titulo: ". $datosComunicado['Titulo'] ." Contenido: ". $datosComunicado['Contenido'] ."Imagen: ". $imagen->{'Imagen'};

        }


        Comunicado::where('id','=',$id)->update($datosComunicado);

        

$auditoria = new AuditoriaController();
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "comunicados";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Actualizacion";
        
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('comunicado')->with('mensaje','Comunicado modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunicado  $comunicado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $comunicado = Comunicado::findOrFail($id);
        Comunicado::where('id','=',$id)->update(['Activo'=>0]);

        $auditoria = new AuditoriaController();
        $Auditoria = [];
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "comunicados";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Eliminacion";
        $Auditoria['detalles'] = "Ha sido eliminada la informacion en comunicados, cambio de estado Activo a cero (0)";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('comunicado')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
        
    }
}
