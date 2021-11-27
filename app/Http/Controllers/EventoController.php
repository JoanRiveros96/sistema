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
        return view('evento.index',$datos);
    }

    public function create()
    {
        return view('evento.create');
    }

    public function store(Request $request)
    {
        $campos=[
            'Fecha'=>'required|date',
            'Titulo'=>'required|string|max:100',
            'Descripcion'=> 'required|string|max:200',
            'Link'=>'nullable|string|max:100',
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
        
        $datosEvento['Usuario'] = auth()->user()->name; 
        
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

        return view('evento.edit',compact('evento'));
    }

    
    public function update(Request $request,$id)
    {
        $campos=[
            'Fecha'=>'required|date',
            'Titulo'=>'required|string|max:100',
            'Descripcion'=> 'required|string|max:200',
            'Link'=>'nullable|string|max:100',
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
        
        if(Storage::delete('public/'.$evento->Imagen)){     
            Evento::destroy($id);            
        }else{Evento::destroy($id);          
        }
        
        
        return redirect('evento')->with('mensaje','Evento borrado');
    }
}
