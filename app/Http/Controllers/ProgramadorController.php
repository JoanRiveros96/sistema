<?php

namespace App\Http\Controllers;

use App\Models\Programador;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProgramadorController extends Controller
{
  
    public function index()
    {
        $datos['programadors']=Programador::paginate(11);
        return view('Programador.index',$datos);
    }

    
    public function create()
    {
        return view('Programador.create');
    }

    public function store(Request $request)
    {
        $campos=[
            
                      
            'Imagen' =>'required|max:10000|mimes:jpeg,png,jpg',
            
            
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosProgramador=request()->except('_token'); 

        if($request->hasFile('Imagen')){
            $file=$request->file('Imagen');
            $nombre= $file->getClientOriginalName();
            $datosProgramador['Imagen']=$request->file('Imagen')->storeAs('programa',$nombre, 'public');
        }

    
        
        $datosProgramador['Usuario'] = auth()->user()->id; 
        
        
        Programador::create($datosProgramador);
        
       
       return redirect('programador')->with('mensaje','Programador agregado con exito');
    }

    
    public function show(Programador $programador)
    {
        //
    }

    
    public function edit($id)
    {
        $programador = Programador::findOrFail($id);

        return view('Programador.edit',compact('programador'));
    }

   
    public function update(Request $request, $id)
    {
        $Auditoria = [];
        
        $imagen =DB::table('programadors')->select('Imagen')->where('id','=',$id)->first();
        $campos=[ 
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            
            
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];

        if($request->hasFile('Imagen')){
            $campos=['Imagen' =>'max:10000|mimes:jpeg,png,jpg'];
            //$mensaje=['Imagen.required'=>'La foto es requerida'];
        }


        $this->validate($request,$campos,$mensaje);

        $datosProgramador=request()->except(['_token','_method']);
        $datosProgramador['Usuario'] = auth()->user()->id;

        if($request->hasFile('Imagen')){
            $Programa = Programador::findOrFail($id);
            Storage::delete('public/'.$Programa->Imagen);
            $file=$request->file('Imagen');
            $nombre= $file->getClientOriginalName();
            $datosProgramador['Imagen']=$request->file('Imagen')->storeAs('programa',$nombre, 'public');
            $Auditoria['detalles'] = "Imagen: ".  $datosProgramador['Imagen'];
        }else{
            $Auditoria['detalles'] = "Imagen: ".  $imagen->{'Imagen'};
        }
        Programador::where('id','=',$id)->update($datosProgramador);
        $auditoria = new AuditoriaController();

        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "programadors";
        $detalleAuditoria['id_tabla']= (int)$id;
        $detalleAuditoria['tipo_modificacion']= "Actualizacion";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('programador')->with('mensaje','Programador modificado');
    }

 
    public function destroy($id)
    {

        $programador = Programador::findOrFail($id);
        Programador::where('id','=',$id)->update(['Activo'=>0]);
        $auditoria = new AuditoriaController();
        $Auditoria = [];
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "programadors";
        $detalleAuditoria['id_tabla']= (int)$id;
        
        $detalleAuditoria['tipo_modificacion']= "Eliminacion";
        $Auditoria['detalles'] = "Ha sido eliminada la informacion en programadors, cambio de estado Activo a cero (0)";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('programador')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');

    }
}
