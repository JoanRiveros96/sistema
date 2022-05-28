<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{

    public function index()
    {
        $datos['matriculas']=Matricula::JOIN('users','matriculas.Usuario','=','users.id')
        ->select('users.name','matriculas.*')
        ->paginate(10);
        return view('Matricula.index',$datos);
    }

    
    public function create()
    {
        return view('Matricula.create');
    }

    
    public function store(Request $request)
    {
        $campos=[
            
            'Fecha'=>'required|date',
            'Requisito'=> 'required|string',
            'Link' =>'string|nullable',
            'Costos' =>'string|nullable',
            'Utiles' =>'string|nullable',
            'Uniformes' =>'string|nullable',
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosMatricula=request()->except('_token'); 

    
        
        $datosMatricula['Usuario'] = auth()->user()->id; 
        
        
        Matricula::create($datosMatricula);
        
       
       return redirect('matricula')->with('mensaje','Matricula agregada con exito');
    }

    
    public function show(Matricula $matricula)
    {
        
    }

   
    public function edit($id)
    {
        $matricula = Matricula::findOrFail($id);

        return view('Matricula.edit',compact('matricula'));
    }

    public function update(Request $request, $id)
    {
        $Auditoria = [];
        
        $campos=[
            
            'Fecha'=>'required|date',
            'Requisito'=> 'required|string',
            'Link' =>'string|nullable',
            'Utiles' =>'string|nullable',
            'Costos' =>'string|nullable',
            'Uniformes' =>'string|nullable',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosMatricula=request()->except(['_token','_method']);
        $datosMatricula['Usuario'] = auth()->user()->id; 

    
        Matricula::where('id','=',$id)->update($datosMatricula);
        $Auditoria['detalles'] = "Fecha: ". $datosMatricula['Fecha'] ." Requisito: ". $datosMatricula['Requisito'] ." Link: " .$datosMatricula["Link"] ." Costos: " . $datosMatricula['Costos'] ." Utiles" . $datosMatricula['Utiles'] ." Uniformes" . $datosMatricula['Uniformes'];

        
        $auditoria = new AuditoriaController();

        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "matriculas";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Actualizacion";
        
        $auditoria->store($Auditoria, $detalleAuditoria);

        return redirect('matricula')->with('mensaje','Matricula modificada');
    }

    public function destroy( $id)
    {

        $matricula = Matricula::findOrFail($id);
        Matricula::where('id','=',$id)->update(['Activo'=>0]);

        $auditoria = new AuditoriaController();
        $Auditoria = [];
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "matriculas";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Eliminacion";
        $Auditoria['detalles'] = "Ha sido eliminada la informacion en matriculas, cambio de estado Activo a cero (0)";
        $auditoria->store($Auditoria, $detalleAuditoria);

        return redirect('matricula')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
        
    }
}
