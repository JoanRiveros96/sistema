<?php

namespace App\Http\Controllers;

use App\Models\Admision;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdmisionController extends Controller
{
   
    public function index()
    {
        $datos['admisiones']=Admision::paginate(5);
        return view('Admision.index',$datos);
    }

    public function create()
    {
        return view('Admision.create');
    }

    
    public function store(Request $request)
    {
        $campos=[
            
            'Fecha'=>'required|date',
            'Requisito'=> 'required|string',
            'Link' =>'required|string',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosAdmision=request()->except('_token'); 

    
        
        $datosAdmision['Usuario'] = auth()->user()->id; 
        
        
        Admision::create($datosAdmision);
        
       
       return redirect('admision')->with('mensaje','Admision agregada con exito');
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
        $campos=[
            
            'Fecha'=>'required|date',
            'Requisito'=> 'required|string',
            'Link' =>'required|string',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);

        $datosAdmision=request()->except(['_token','_method']);

        $datosAdmision['Usuario'] = auth()->user()->id;

    
        Admision::where('id','=',$id)->update($datosAdmision);

        $admision = Admision::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('admision')->with('mensaje','Admision modificada');
    }

   
    public function destroy($id)
    {

        $admision = Admision::findOrFail($id);
        Admision::where('id','=',$id)->update(['Activo'=>0]);
        return redirect('admision')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
        // $admision = Admision::findOrFail($id);
        // Admision::destroy($id);
        
    }
}
