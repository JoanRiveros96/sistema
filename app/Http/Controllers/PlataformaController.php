<?php

namespace App\Http\Controllers;

use App\Models\Plataforma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlataformaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['plataformas']=Plataforma::paginate(5);
        return view('plataforma.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('plataforma.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            
            'Titulo'=>'required',
            'Descripcion'=> 'required|string|max:1000',
            'Link'=> 'required|string|max:1000',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosPlataforma=request()->except('_token'); 
                
        $datosPlataforma['Usuario'] = auth()->user()->name; 
        
        
        Plataforma::create($datosPlataforma);
        
       
       return redirect('plataforma')->with('mensaje','Plataforma agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plataforma  $plataforma
     * @return \Illuminate\Http\Response
     */
    public function show(Plataforma $plataforma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plataforma  $plataforma
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $plataforma = Plataforma::findOrFail($id);

        return view('plataforma.edit',compact('plataforma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plataforma  $plataforma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            
            'TipoInfo'=>'required',
            'Informacion'=> 'required|string|max:1000',
            'Link'=> 'nullable|string|max:1000',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];      
        

        $this->validate($request,$campos,$mensaje);

        $datosPlataforma=request()->except(['_token','_method']);

        Plataforma::where('id','=',$id)->update($datosPlataforma);

        $plataforma = Plataforma::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('plataforma')->with('mensaje','Plataforma modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plataforma  $plataforma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       
        $plataforma = Plataforma::findOrFail($id);
        Plataforma::destroy($id);    
        
        return redirect('plataforma')->with('mensaje','Plataforma borrada');
    }
}
