<?php

namespace App\Http\Controllers;

use App\Models\Historia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['historias']=Historia::paginate(5);
        return view('historia.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('historia.create');
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
            
            'Año'=>'required|string|max:4',
            'Informacion'=> 'required|string|max:1000',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosHistoria=request()->except('_token'); 

        if($request->hasFile('Imagen')){
            $datosHistoria['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        else{
            $datosHistoria['Imagen'] = '';
        }
        
        $datosHistoria['Usuario'] = auth()->user()->name; 
        
        
        Historia::create($datosHistoria);
        
       
       return redirect('historia')->with('mensaje','Historia agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function show(Historia $historia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $historia = Historia::findOrFail($id);

        return view('historia.edit',compact('historia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            
            'Año'=>'required|string|max:4',
            'Informacion'=> 'required|string|max:1000',
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

        $datosHistoria=request()->except(['_token','_method']);

        if($request->hasFile('Imagen')){
            $historia = Historia::findOrFail($id);
            Storage::delete('public/'.$historia->Imagen);
            $datosHistoria['Imagen']=$request->file('Imagen')->store('uploads','public');
        }


        Historia::where('id','=',$id)->update($datosHistoria);

        $historia = Hstoria::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('historia')->with('mensaje','Historia modificada');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $historia = Historia::findOrFail($id);
        
        if(Storage::delete('public/'.$historia->Imagen)){     
            Historia::destroy($id);            
        }else{Historia::destroy($id);          
        }
        
        
        return redirect('historia')->with('mensaje','Historia borrada');
    }
}
