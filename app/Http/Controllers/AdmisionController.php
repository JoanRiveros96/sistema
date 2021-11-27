<?php

namespace App\Http\Controllers;

use App\Models\Admision;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdmisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['admisiones']=Admision::paginate(5);
        return view('admision.index',$datos);
    }

    public function create()
    {
        return view('admision.create');
    }

    
    public function store(Request $request)
    {
        $campos=[
            
            'Fecha'=>'required|date',
            'Requisito'=> 'required|string|max:1000',
            'Link' =>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosAdmision=request()->except('_token'); 

    
        
        $datosAdmision['Usuario'] = auth()->user()->name; 
        
        
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

        return view('admision.edit',compact('admision'));
    }

    
    public function update(Request $request, $id)
    {
        $campos=[
            
            'Fecha'=>'required|date',
            'Requisito'=> 'required|string|max:1000',
            'Link' =>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);

        $datosAdmision=request()->except(['_token','_method']);

    
        Admision::where('id','=',$id)->update($datosAdmision);

        $admision = Admision::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('admision')->with('mensaje','Admision modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admision  $admision
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admision = Admision::findOrFail($id);
        Admision::destroy($id);
        return redirect('admision')->with('mensaje','Admision borrada');
    }
}
