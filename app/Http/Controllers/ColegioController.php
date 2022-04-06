<?php

namespace App\Http\Controllers;

use App\Models\Colegio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ColegioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['colegios']=Colegio::paginate(5);
        return view('Colegio.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Colegio.create');
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
            
            'TipoInfo'=>'required',
            'Informacion'=> 'required|string',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            'Link'=> 'nullable|string',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosColegio=request()->except('_token'); 

        if($request->hasFile('Imagen')){
            $datosColegio['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        else{
            $datosColegio['Imagen'] = '';
        }
        
        $datosColegio['Usuario'] = auth()->user()->id; 
        
        
        Colegio::create($datosColegio);
        
       
       return redirect('colegio')->with('mensaje','Informacion del Colegio agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colegio  $colegio
     * @return \Illuminate\Http\Response
     */
    public function show(Colegio $colegio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Colegio  $colegio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $colegio = Colegio::findOrFail($id);

        return view('Colegio.edit',compact('colegio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Colegio  $colegio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            
            
            'Informacion'=> 'required|string',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            'Link'=> 'nullable|string',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];

        if($request->hasFile('Imagen')){
            $campos=['Imagen' =>'max:10000|mimes:jpeg,png,jpg'];
            //$mensaje=['Imagen.required'=>'La foto es requerida'];
        }
        

        $this->validate($request,$campos,$mensaje);

        $datosColegio=request()->except(['_token','_method']);
        $datosColegio['Usuario'] = auth()->user()->id; 

        if($request->hasFile('Imagen')){
            $colegio = Colegio::findOrFail($id);
            Storage::delete('public/'.$colegio->Imagen);
            $datosColegio['Imagen']=$request->file('Imagen')->store('uploads','public');
        }


        Colegio::where('id','=',$id)->update($datosColegio);

        $colegio = Colegio::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('colegio')->with('mensaje','Informacion del Colegio modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colegio  $colegio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $colegio = Colegio::findOrFail($id);
        Colegio::where('id','=',$id)->update(['Activo'=>0]);
        
        
        // if(Storage::delete('public/'.$colegio->Imagen)){     
        //     Colegio::destroy($id);            
        // }else{Colegio::destroy($id);          
        // }
        
        
        return redirect('colegio')->with('mensaje','Informacion del Colegio borrada');
    }
}
