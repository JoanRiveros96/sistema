<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cuentas']=Cuenta::paginate(5);
        return view('cuenta.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuenta.create');
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
            'Titulo'=>'required|string|max:100',
            'Contenido'=> 'required|string|max:1000',
            'Imagen' =>'required|max:10000|mimes:jpeg,png,jpg',
            'Documento'=> 'nullable|max:10000|mimes:docx,pdf',
            
        

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Fecha.date'=> 'el :attribute debe ser una fecha',
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
        
        $datosCuenta['Usuario'] = auth()->user()->name; 
        
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

        return view('cuenta.edit',compact('cuenta'));
    }

    
    public function update(Request $request, $id)
    {
        $campos=[
            'Fecha'=>'required|date',
            'Titulo'=>'required|string|max:100',
            'Contenido'=> 'required|string|max:1000',
            'Imagen' =>'required|max:10000|mimes:jpeg,png,jpg',
            'Documento'=> 'nullable|max:10000|mimes:docx,pdf',
            
        

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Fecha.date'=> 'el :attribute debe ser una fecha',
            'Imagen.required'=>'La foto es requerida'

        ];

        if($request->hasFile('Imagen')){
            $campos=['Imagen' =>'max:10000|mimes:jpeg,png,jpg'];
            //$mensaje=['Imagen.required'=>'La foto es requerida'];
        }
        if($request->hasFile('Documento')){
            $campos=['Documento' =>'max:10000|mimes:docx,pdf'];
            //$mensaje=['Imagen.required'=>'La foto es requerida'];
        }


        $this->validate($request,$campos,$mensaje);

        $datosCuenta=request()->except(['_token','_method']);

        if($request->hasFile('Imagen')){
            $cuenta = Cuenta::findOrFail($id);
            Storage::delete('public/'.$cuenta->Imagen);
            $datosCuenta['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        if($request->hasFile('Documento')){
            $cuenta = Cuenta::findOrFail($id);
            Storage::delete('public/'.$cuenta->Documento);
            $datosCuenta['Documento']=$request->file('Documento')->store('docs','public');
        }


        Cuenta::where('id','=',$id)->update($datosCuenta);

        $cuenta = Cuenta::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('cuenta')->with('mensaje','Rendicion de cuenta modificada');


    }

    
    public function destroy($id)
    {
        $cuenta = Cuenta::findOrFail($id);
        
        if(Storage::delete('public/'.$cuenta->Imagen)){
            Cuenta::destroy($id);
            
        }if(Storage::delete('public/'.$cuenta->Documento)){
            Cuenta::destroy($id);
            
        }
        
        
        return redirect('cuenta')->with('mensaje','Rendicion de cuentas borrada');
    }
}
