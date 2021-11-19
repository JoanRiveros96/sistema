<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComunicadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['comunicados']=Comunicado::paginate(5);
        return view('comunicado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('comunicado.create');
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
            'Fecha'=>'required|date',
            'Titulo'=>'required|string|max:100',
            'Contenido'=> 'required|string|max:1000',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            
            
        

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Fecha.date'=> 'el :attribute debe ser una fecha',

        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosComunicado=request()->except('_token');
        

        if($request->hasFile('Imagen')){
            $datosComunicado['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        else{
            $datosComunicado['Imagen'] = '';
        }
        
        $datosComunicado['Usuario'] = auth()->user()->name; 
        
        
        Comunicado::create($datosComunicado);
        
       
       return redirect('comunicado')->with('mensaje','Comunicado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comunicado  $comunicado
     * @return \Illuminate\Http\Response
     */
    public function show(Comunicado $comunicado)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comunicado  $comunicado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comunicado = Comunicado::findOrFail($id);

        return view('comunicado.edit',compact('comunicado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comunicado  $comunicado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            
            'Fecha'=>'required|date',
            'Titulo'=>'required|string|max:100',
            'Contenido'=> 'required|string|max:1000',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];

        if($request->hasFile('Imagen')){
            $campos=['Imagen' =>'max:10000|mimes:jpeg,png,jpg'];
            //$mensaje=['Imagen.required'=>'La foto es requerida'];
        }
        

        $this->validate($request,$campos,$mensaje);

        $datosComunicado=request()->except(['_token','_method']);

        if($request->hasFile('Imagen')){
            $comunicado = Comunicado::findOrFail($id);
            Storage::delete('public/'.$comunicado->Imagen);
            $datosComunicado['Imagen']=$request->file('Imagen')->store('uploads','public');
        }


        Comunicado::where('id','=',$id)->update($datosComunicado);

        $comunicado = Comunicado::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('comunicado')->with('mensaje','Comunicado modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunicado  $comunicado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comunicado = Comunicado::findOrFail($id);
        
        if(Storage::delete('public/'.$comunicado->Imagen)){
            Comunicado::destroy($id);
            return redirect('comunicado')->with('mensaje','Comunicado borrado');
        }
        
        
        return redirect('comunicado');
    }
}
