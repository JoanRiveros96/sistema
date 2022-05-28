<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cuentas']=Cuenta::JOIN('users','cuentas.Usuario','=','users.id')
        ->select('users.name','cuentas.*')
        ->paginate(10);
        return view('Cuenta.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cuenta.create');
    }

    public function download($id)
    {
    
        $cuenta = Cuenta::where('id', $id)->firstOrFail();
        $pathToFile = storage_path("app\public/".$cuenta->Documento);
        // return response()->download($pathToFile);
        return response()->file($pathToFile);
    }

   
    public function store(Request $request)
    {
        $campos=[
            'Fecha'=>'required|date',
            'Titulo'=>'required|string',
            'Contenido'=> 'required|string',
            'Imagen' =>'required|max:10000|mimes:jpeg,png,jpg',
            'Documento'=> 'nullable|max:10000|mimes:docx,pdf,php',
            
        

        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'Fecha.date'=> 'el campo :attribute debe ser una fecha',
            'Imagen.required'=>'La foto es requerida'

        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosCuenta=request()->except('_token');
        

        if($request->hasFile('Imagen')){
            $datosCuenta['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        else{
            $datosCuenta['Imagen'] = '';
        }
        
        if($request->hasFile('Documento')){
            //$doc = $request->file('Documento')->getClientOriginalName();
            $datosCuenta['Documento']=$request->file('Documento')->store('docs','public');
        }
        else{
            $datosCuenta['Documento'] = '';
        }
        
        $datosCuenta['Usuario'] = auth()->user()->id; 
        
        Cuenta::create($datosCuenta);
        
       
       return redirect('cuenta')->with('mensaje','Rendicion de cuentas agregada con exito');
    }

   
    public function show(Cuenta $cuenta)
    {
        //
    }

    
    public function edit($id)
    {
        $cuenta = Cuenta::findOrFail($id);

        return view('Cuenta.edit',compact('cuenta'));
    }

    
    public function update(Request $request, $id)
    {
        $Auditoria = [];
        $Imagen =DB::table('cuentas')->select('Imagen')->where('id','=',$id)->first();
        $Doc =DB::table('cuentas')->select('Documento')->where('id','=',$id)->first();
        $campos=[
            'Fecha'=>'required|date',
            'Titulo'=>'required|string',
            'Contenido'=> 'required|string',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            'Documento'=> 'nullable|max:10000|mimes:docx,pdf,php',
            
        

        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'Fecha.date'=> 'el campo :attribute debe ser una fecha',
            'Imagen.required'=>'La foto es requerida'

        ];

        if($request->hasFile('Imagen')){
            $campos=['Imagen' =>'max:10000|mimes:jpeg,png,jpg'];
            //$mensaje=['Imagen.required'=>'La foto es requerida'];
        }
        if($request->hasFile('Documento')){
            $campos=['Documento' =>'max:10000|mimes:docx,pdf,php'];
            //$mensaje=['Imagen.required'=>'La foto es requerida'];
        }


        $this->validate($request,$campos,$mensaje);

        $datosCuenta=request()->except(['_token','_method']);
        $datosCuenta['Usuario'] = auth()->user()->id;
        
        if($request->hasFile('Imagen') && $request->hasFile('Documento')){
            $cuenta = Cuenta::findOrFail($id);
            Storage::delete('public/'.$cuenta->Imagen);
            Storage::delete('public/'.$cuenta->Documento);
            $datosCuenta['Imagen']=$request->file('Imagen')->store('uploads','public');
            $datosCuenta['Documento']=$request->file('Documento')->store('docs','public');
            $Auditoria['detalles'] = "Fecha: ".  $datosCuenta['Fecha'] ."Titulo: " . $datosCuenta['Titulo'] ."Contenido: " . $datosCuenta['Contenido'] ."Ubicacion Imagen: " . $datosCuenta['Imagen'] ."Ubicacion Documento: " . $datosCuenta['Documento'];

        }elseif ($request->hasFile('Imagen') OR $request->hasFile('Documento')) {
            if($request->hasFile('Imagen')){
            $cuenta = Cuenta::findOrFail($id);
            Storage::delete('public/'.$cuenta->Imagen);
            $datosCuenta['Imagen']=$request->file('Imagen')->store('uploads','public');
            $Auditoria['detalles'] = "Fecha: ".  $datosCuenta['Fecha'] ."Titulo: " . $datosCuenta['Titulo'] ."Contenido: " . $datosCuenta['Contenido'] ."Ubicacion Imagen: " . $datosCuenta['Imagen'] ."Ubicacion Documento: " . $Doc->{'Documento'};
            }
            if($request->hasFile('Documento')){
            $cuenta = Cuenta::findOrFail($id);
            Storage::delete('public/'.$cuenta->Documento);
            $datosCuenta['Documento']=$request->file('Documento')->store('docs','public');
            $Auditoria['detalles'] = "Fecha: ".  $datosCuenta['Fecha'] ."Titulo: " . $datosCuenta['Titulo'] ."Contenido: " . $datosCuenta['Contenido'] ."Ubicacion Imagen: " . $Imagen->{'Imagen'} ."Ubicacion Documento: " . $datosCuenta['Documento'];
            }
        }else{
            $Auditoria['detalles'] = "Fecha: ".  $datosCuenta['Fecha'] ."Titulo: " . $datosCuenta['Titulo'] ."Contenido: " . $datosCuenta['Contenido'] ."Ubicacion Imagen: " . $Imagen->{'Imagen'} ."Ubicacion Documento: " . $Doc->{'Documento'};

        }


        Cuenta::where('id','=',$id)->update($datosCuenta);

        

       
                
        $auditoria = new AuditoriaController();
        
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "cuentas";
        $detalleAuditoria['id_tabla']= (int)$id;
        $detalleAuditoria['tipo_modificacion']= "Actualizacion";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('cuenta')->with('mensaje','Rendicion de cuenta modificada');


    }

    
    public function destroy($id)
    {
        $cuenta = Cuenta::findOrFail($id);
        Cuenta::where('id','=',$id)->update(['Activo'=>0]);

        $auditoria = new AuditoriaController();
        $Auditoria = [];
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "cuentas";
        $detalleAuditoria['id_tabla']= (int)$id;
        
        $detalleAuditoria['tipo_modificacion']= "Eliminacion";
        $Auditoria['detalles'] = "Ha sido eliminada la informacion en cuentas, cambio de estado Activo a cero (0)";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('cuenta')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');

        
    }
}
