<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class EmpleadoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados']=Empleado::JOIN('users','empleados.Usuario','=','users.id')
        ->select('users.name','empleados.*')
        ->paginate(10);
        return view('Empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            
            'Nombre'=>'required|string',            
            'Dependencia' =>'required',
            'Descripcion' =>'required|string',
            'Correo' => 'required_if:Dependencia,Docente Secundaria',
            'Foto' =>'required|max:10000|mimes:jpeg,png,jpg',
        

        ];
        $mensaje=[

            'Correo.required_if'=>'El correo es requerido si es un docente de secundaria',
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida'

        ];


        $this->validate($request,$campos,$mensaje);


        //$datosEmpleado=request()->all();
        $datosEmpleado=request()->except('_token');

        if($request->hasFile('Foto')){
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }
        $datosEmpleado['Usuario'] = auth()->user()->id;

        Empleado::create($datosEmpleado);
        
       //return response()->json($datosEmpleado);
       return redirect('empleado')->with('mensaje','Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::findOrFail($id);

        return view('Empleado.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Auditoria = [];
        $foto = DB::table('empleados')->select('Foto')->where('id','=',$id)->first();
        $dependencia = DB::table('empleados')->select('Dependencia')->where('id','=', $id)->first();
        $campos=[
            'Nombre'=>'required|string',   
            'Descripcion' =>'required|string',
            'Correo' => 'required_if:Dependencia,Docente Secundaria',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            

        ];

        if($request->hasFile('Foto')){
            $campos=['Foto' =>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La foto es requerida'];
        }
        

        $this->validate($request,$campos,$mensaje);
        //
        $datosEmpleado=request()->except(['_token','_method']);
        $datosEmpleado['Usuario'] = auth()->user()->id;

        if($request->hasFile('Foto')){
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto);
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
            $Auditoria['detalles'] = "Nombre: ". $datosEmpleado['Nombre'] ." Dependencia: ". $dependencia->{'Dependencia'} ." Descripcion: ". $datosEmpleado['Descripcion']  ." Foto: " . $datosEmpleado['Foto'] ."Correo: " . $datosEmpleado['Correo'];
        }else{
            $Auditoria['detalles'] = "Nombre: ". $datosEmpleado['Nombre'] ." Dependencia: ". $dependencia->{'Dependencia'} ." Descripcion: ". $datosEmpleado['Descripcion'] ." Foto: " . $foto->{'Foto'} ."Correo: " . $datosEmpleado['Correo'];

        }

        Empleado::where('id','=',$id)->update($datosEmpleado);
        $auditoria = new AuditoriaController();
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "empleados";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Actualizacion";
        
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('empleado')->with('mensaje','Empleado modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $empleado = Empleado::findOrFail($id);
        Empleado::where('id','=',$id)->update(['Activo'=>0]);

        $auditoria = new AuditoriaController();
        $Auditoria = [];
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "empleados";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Eliminacion";
        $Auditoria['detalles'] = "Ha sido eliminada la informacion en empleados, cambio de estado Activo a cero (0)";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('empleado')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
        
    }
}
