<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AuditoriaController;
use App\Models\Admision;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdmisionController extends Controller
{
   
    public function index()
    {
        $datos['admisiones']=DB::table('admisions')
        ->JOIN('users','admisions.Usuario','=','users.id')
        ->select('users.name', 'admisions.*')
        ->paginate(10);
        return view('Admision.index',$datos);
    }

    public function create()
    {
        return view('Admision.create');
    }

    
    public function store(Request $request)
    {
        
        $infoAuditoria = [];
        

        $campos=[
            
            'Fecha'=>'required|date',
            'Requisito'=> 'required|string',
            'Link' =>'string|nullable',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosAdmision=request()->except('_token'); 

    
        
        $datosAdmision['Usuario'] = auth()->user()->id; 
        $infoAuditoria['id_responsable'] = auth()->user()->id;
        $infoAuditoria['tabla_modificada'] = "Admisions";
        $infoAuditoria['info_registrada'] = $datosAdmision;
        
        Admision::create($datosAdmision);
        return $datosAdmision;
        
        
    //   return redirect('admision')->with('mensaje','Admision agregada con exito');
    }

    
    public function show(Admision $admision)
    {
        //
    }

  
    public function edit($id)
    {
        $admision = Admision::findOrFail($id);

        return view('Admision.edit',compact('admision'));
    }

    
    public function update(Request $request, $id)
    {
        $auditoria = new AuditoriaController();
        $Auditoria = [];
        $detalleAuditoria = [];
        $campos=[
            
            'Fecha'=>'required|date',
            'Requisito'=> 'required|string',
            'Link' =>'string|nullable',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);

        $datosAdmision=request()->except(['_token','_method']);
        $datosAdmision['Usuario'] = auth()->user()->id;

        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "admisions";
        $detalleAuditoria['id_tabla']= (int)$id;
        // $detalleAuditoria['id_auditoria'] = ;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Actualizacion";


        $Auditoria['detalles'] = "Fecha: ". $datosAdmision['Fecha'] .", Requisito: ". $datosAdmision['Requisito'] .", Link: " . $datosAdmision['Link'];

         
      

        Admision::where('id','=',$id)->update($datosAdmision);
        
        $auditoria->store($Auditoria, $detalleAuditoria);
        // return $detalleAuditoria;
        return redirect('admision')->with('mensaje','Admision modificada');
    }

   
    public function destroy($id)
    {
        $admision = Admision::findOrFail($id);
        Admision::where('id','=',$id)->update(['Activo'=>0]);
        $auditoria = new AuditoriaController();
        $Auditoria = [];
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "admisions";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Eliminacion";
        $Auditoria['detalles'] = "Ha sido eliminada la informacion en admisiones, cambio de estado Activo a cero (0)";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('admision')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
    }
}
