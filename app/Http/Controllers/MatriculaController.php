<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MatriculaController extends Controller
{

    public function index()
    {
        $datos['matriculas']=Matricula::paginate(5);
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
            'Link' =>'required|string',
            'Costos' =>'required|string',
            'Utiles' =>'required|string',
            'Uniformes' =>'required|string',
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
        $campos=[
            
            'Fecha'=>'required|date',
            'Requisito'=> 'required|string',
            'Link' =>'required|string',
            'Costos' =>'required|string',
            'Utiles' =>'required|string',
            'Uniformes' =>'required|string',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosMatricula=request()->except(['_token','_method']);
        $datosMatricula['Usuario'] = auth()->user()->id; 

    
        Matricula::where('id','=',$id)->update($datosMatricula);

        $matricula = Matricula::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('matricula')->with('mensaje','Matricula modificada');
    }

    public function destroy( $id)
    {

        $matricula = Matricula::findOrFail($id);
        Matricula::where('id','=',$id)->update(['Activo'=>0]);
        return redirect('matricula')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
        // $matricula = Matricula::findOrFail($id);
        // Matricula::destroy($id);
        // return redirect('matricula')->with('mensaje','Matricula borrada');
    }
}
