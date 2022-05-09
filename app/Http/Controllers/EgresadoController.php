<?php

namespace App\Http\Controllers;

use App\Models\Egresado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EgresadoController extends Controller
{
    public function index()
    {
        $datos['egresados']=Egresado::paginate(5);
        return view('Egresado.index',$datos);
    }

    public function create()
    {
        return view('Egresado.create');
    }

    public function store(Request $request)
    {
        $campos=[
            'AñoGrado'=>'required|string|max:4',
            'Nombre'=>'required|string',
            'Afinidad'=> 'required|string|max:1000',
            'Descripcion'=> 'required|string|max:1000',
            'Foto' =>'dimensions:max_width=150,max_height=183|max:10000|mimes:jpg',
            
            
        

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'dimensions'=> 'las dimensiones maximas para las fotos son: 150px * 183px',
            

        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosEgresado=request()->except('_token');
        

        if($request->hasFile('Foto')){
            $datosEgresado['Foto']=$request->file('Foto')->store('uploads','public');
        }
        else{
            $datosEgresado['Foto'] = '';
        }
        
        $datosEgresado['Usuario'] = auth()->user()->id; 
        
        Egresado::create($datosEgresado);
        
       
       return redirect('egresado')->with('mensaje','Egresado agregado con exito');
    }

    public function show(Egresado $egresado)
    {
        //
    }

    public function edit($id)
    {
        
        $egresado = Egresado::findOrFail($id);

        return view('Egresado.edit',compact('egresado'));
    }

    public function update(Request $request, $id)
    {
        $campos=[
            
            'AñoGrado'=>'required|string|max:4',
            'Nombre'=>'required|string',
            'Afinidad'=> 'required|string|max:1000',
            'Descripcion'=> 'required|string|max:1000',
            'Foto' =>'dimensions:max_width=150,max_height=183|max:10000|mimes:jpg',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'dimensions'=> 'las dimensiones maximas para las fotos son: 150px * 183px',

        ];

        if($request->hasFile('Foto')){
            $campos=['Foto' =>'max:10000|mimes:jpeg,png,jpg'];
            //$mensaje=['Imagen.required'=>'La foto es requerida'];
        }
        

        $this->validate($request,$campos,$mensaje);

        $datosEgresado=request()->except(['_token','_method']);
        $datosEgresado['Usuario'] = auth()->user()->id; 

        if($request->hasFile('Foto')){
            $egresado = Egresado::findOrFail($id);
            Storage::delete('public/'.$egresado->Foto);
            $datosEgresado['Foto']=$request->file('Foto')->store('uploads','public');
        }


        Egresado::where('id','=',$id)->update($datosEgresado);

        $egresado = Egresado::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('egresado')->with('mensaje','Egresado modificado');
    }

    public function destroy($id)
    {

        $egresado = Egresado::findOrFail($id);
        Egresado::where('id','=',$id)->update(['Activo'=>0]);
        return redirect('egresado')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
        
        // $egresado = Egresado::findOrFail($id);
        
        // if(Storage::delete('public/'.$egresado->Foto)){     
        //     Egresado::destroy($id);            
        // }else{Egresado::destroy($id);          
        // }
        
        
        // return redirect('egresado')->with('mensaje','Egresado borrado');
    }
}
