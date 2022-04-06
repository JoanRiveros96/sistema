<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    public function index()
    {
        $datos['eventos']=Evento::paginate(10);
        return view('Evento.index',$datos);
    }

    public function create()
    {
        return view('Evento.create');
    }

    public function store(Request $request)
    {
        $campos=[
            'Fecha'=>'required|date',
            'Titulo'=>'required|string',
            'Descripcion'=> 'required|string',
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
        
        $datosEvento=request()->except('_token');
        

        if($request->hasFile('Imagen')){
            $datosEvento['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        // else{
        //     $datosEvento['Imagen'] = '';
        // }
        
        $datosEvento['Usuario'] = auth()->user()->id; 
        
        Evento::create($datosEvento);
        
       
       return redirect('evento')->with('mensaje','Evento agregado con exito');
    }

    
    public function show(Evento $evento)
    {
        //
    }

    
    public function edit($id)
    {
        $evento = Evento::findOrFail($id);

        return view('Evento.edit',compact('evento'));
    }

    
    public function update(Request $request,$id)
    {
        $campos=[
            'Fecha'=>'required|date',
            'Titulo'=>'required|string',
            'Descripcion'=> 'required|string',
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

        $datosEvento=request()->except(['_token','_method']);
        $datosEvento['Usuario'] = auth()->user()->id; 

        if($request->hasFile('Imagen')){
            $evento = Evento::findOrFail($id);
            Storage::delete('public/'.$evento->Imagen);
            $datosEvento['Imagen']=$request->file('Imagen')->store('uploads','public');
        }


        Evento::where('id','=',$id)->update($datosEvento);

        $evento = Evento::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('evento')->with('mensaje','Evento modificado');
    }

    public function destroy($id)
    {

        $evento = Evento::findOrFail($id);
        Evento::where('id','=',$id)->update(['Activo'=>0]);
        return redirect('evento')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');

        // $evento = Evento::findOrFail($id);
        
        // if(Storage::delete('public/'.$evento->Imagen)){     
        //     Evento::destroy($id);            
        // }else{Evento::destroy($id);          
        // }
        
        
        // return redirect('evento')->with('mensaje','Evento borrado');
    }
}
