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
        return view('matricula.index',$datos);
    }

    
    public function create()
    {
        return view('matricula.create');
    }

    
    public function store(Request $request)
    {
        $campos=[
            
            'Fecha'=>'required|date',
            'Requisito'=> 'required|string|max:1000',
            'Link' =>'required|string|max:100',
            'Costos' =>'required|string|max:250',
            'Utiles' =>'required|string|max:2000',
            'Uniformes' =>'required|string|max:200',
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosMatricula=request()->except('_token'); 

    
        
        $datosMatricula['Usuario'] = auth()->user()->name; 
        
        
        Matricula::create($datosMatricula);
        
       
       return redirect('matricula')->with('mensaje','Matricula agregada con exito');
    }

    
    public function show(Matricula $matricula)
    {
        
    }

   
    public function edit($id)
    {
        $matricula = Matricula::findOrFail($id);

        return view('matricula.edit',compact('matricula'));
    }

    public function update(Request $request, $id)
    {
        $campos=[
            
            'Fecha'=>'required|date',
            'Requisito'=> 'required|string|max:1000',
            'Link' =>'required|string|max:100',
            'Costos' =>'required|string|max:250',
            'Utiles' =>'required|string|max:2000',
            'Uniformes' =>'required|string|max:200',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosMatricula=request()->except(['_token','_method']);

    
        Matricula::where('id','=',$id)->update($datosMatricula);

        $matricula = Matricula::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('matricula')->with('mensaje','Matricula modificada');
    }

    public function destroy( $id)
    {
        $matricula = Matricula::findOrFail($id);
        Matricula::destroy($id);
        return redirect('matricula')->with('mensaje','Matricula borrada');
    }
}
