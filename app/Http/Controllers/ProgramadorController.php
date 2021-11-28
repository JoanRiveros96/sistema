<?php

namespace App\Http\Controllers;

use App\Models\Programador;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramadorController extends Controller
{
  
    public function index()
    {
        $datos['programadors']=Programador::paginate(5);
        return view('programador.index',$datos);
    }

    
    public function create()
    {
        return view('programador.create');
    }

    public function store(Request $request)
    {
        $campos=[
            
                      
            'Link' =>'required|string|max:100',
            'Descripcion'=> 'required|string|max:1000',
            
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosProgramador=request()->except('_token'); 

    
        
        $datosProgramador['Usuario'] = auth()->user()->name; 
        
        
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

        return view('programador.edit',compact('programador'));
    }

   
    public function update(Request $request, $id)
    {
        $campos=[
            
                      
            'Link' =>'required|string|max:100',
            'Descripcion'=> 'required|string|max:1000',
            
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);

        $datosProgramador=request()->except(['_token','_method']);

    
        Programador::where('id','=',$id)->update($datosProgramador);

        $programador = programador::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('programador')->with('mensaje','Programador modificado');
    }

 
    public function destroy($id)
    {
        $programador = Programador::findOrFail($id);
        Programador::destroy($id);
        return redirect('programador')->with('mensaje','Programador borrado');
    }
}
