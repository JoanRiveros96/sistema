<?php

namespace App\Http\Controllers;

use App\Models\Historia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['historias']=Historia::paginate(10);
        return view('Historia.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Historia.create');
    }

    public function store(Request $request)
    {
        //
        $campos=[
            
            'Anio'=>'required|integer|max:2022',
            'Informacion'=> 'required|string',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosHistoria=request()->except('_token'); 

        if($request->hasFile('Imagen')){
            $datosHistoria['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        else{
            $datosHistoria['Imagen'] = '';
        }
        
        $datosHistoria['Usuario'] = auth()->user()->id; 
        
        
        Historia::create($datosHistoria);
        
       
       return redirect('historia')->with('mensaje','Historia agregada con exito');
    }

    public function show(Historia $historia)
    {
        //
    }

    
    public function edit($id)
    {
        //
        $historia = Historia::findOrFail($id);

        return view('Historia.edit',compact('historia'));
    }


    public function update(Request $request, $id)
    {
        $Auditoria = [];
        $imagen = DB::table('historias')->select('Imagen')->where('id','=',$id)->first();
        
        $campos=[
            
            'Anio'=>'required|integer|max:2022',
            'Informacion'=> 'required|string',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            

        ];

        if($request->hasFile('Imagen')){
            $campos=['Imagen' =>'max:10000|mimes:jpeg,png,jpg'];
            //$mensaje=['Imagen.required'=>'La foto es requerida'];
        }
        

        $this->validate($request,$campos,$mensaje);

        $datosHistoria=request()->except(['_token','_method']);
        $datosHistoria['Usuario'] = auth()->user()->id; 

        if($request->hasFile('Imagen')){
            $historia = Historia::findOrFail($id);
            Storage::delete('public/'.$historia->Imagen);
            $datosHistoria['Imagen']=$request->file('Imagen')->store('uploads','public');
            $Auditoria['detalles'] = "Año: ". $datosHistoria['Anio'] ." Informacion: ". $datosHistoria['Informacion'] ." Imagen: " .$datosHistoria['Imagen'];
        }else{
            $Auditoria['detalles'] = "Año: ". $datosHistoria['Anio'] ." Informacion: ". $datosHistoria['Informacion'] ." Imagen: " .$imagen->{'Imagen'};

        }


        Historia::where('id','=',$id)->update($datosHistoria);
        $auditoria = new AuditoriaController();

        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "historias";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Actualizacion";
        
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('historia')->with('mensaje','Historia modificada');
     }

    
    public function destroy($id)
    {

        $historia = Historia::findOrFail($id);
        Historia::where('id','=',$id)->update(['Activo'=>0]);

        $auditoria = new AuditoriaController();
        $Auditoria = [];
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "historias";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Eliminacion";
        $Auditoria['detalles'] = "Ha sido eliminada la informacion en historias, cambio de estado Activo a cero (0)";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('historia')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
        
    }
}
