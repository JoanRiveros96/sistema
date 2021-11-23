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
        return view('colegio.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('colegio.create');
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
            'Informacion'=> 'required|string|max:1000',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            'Link'=> 'nullable|string|max:1000',
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
        
        $datosColegio['Usuario'] = auth()->user()->name; 
        
        
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

        return view('colegio.edit',compact('colegio'));
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
            
            'TipoInfo'=>'required',
            'Informacion'=> 'required|string|max:1000',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            'Link'=> 'nullable|string|max:1000',
            
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
        
        if(Storage::delete('public/'.$colegio->Imagen)){     
            Colegio::destroy($id);            
        }else{Colegio::destroy($id);          
        }
        
        
        return redirect('colegio')->with('mensaje','Informacion del Colegio borrada');
    }
}