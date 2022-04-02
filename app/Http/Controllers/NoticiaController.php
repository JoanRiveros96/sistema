<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['noticias']=Noticia::paginate(5);
        return view('Noticia.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Noticia.create');
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
            'Titulo'=>'required|string',
            'Contenido'=> 'required|string',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            'Link'=> 'nullable|string',
            
        

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Fecha.date'=> 'el :attribute debe ser una fecha',

        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosNoticia=request()->except('_token');
        

        if($request->hasFile('Imagen')){
            $datosNoticia['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        else{
            $datosNoticia['Imagen'] = '';
        }
        
        $datosNoticia['Usuario'] = auth()->user()->name; 
        
        Noticia::create($datosNoticia);
        
       
       return redirect('noticia')->with('mensaje','Noticia agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        
    }
    
    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);

        return view('Noticia.edit',compact('noticia'));
    }

    public function update(Request $request, $id)
    {
        //
        $campos=[
            
            'Fecha'=>'required|date',
            'Titulo'=>'required|string',
            'Contenido'=> 'required|string',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
            'Link'=>'nullable|string',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];

        if($request->hasFile('Imagen')){
            $campos=['Imagen' =>'max:10000|mimes:jpeg,png,jpg'];
            //$mensaje=['Imagen.required'=>'La foto es requerida'];
        }
        

        $this->validate($request,$campos,$mensaje);

        $datosNoticia=request()->except(['_token','_method']);

        if($request->hasFile('Imagen')){
            $noticia = Noticia::findOrFail($id);
            Storage::delete('public/'.$noticia->Imagen);
            $datosNoticia['Imagen']=$request->file('Imagen')->store('uploads','public');
        }


        Noticia::where('id','=',$id)->update($datosNoticia);

        $noticia = Noticia::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('noticia')->with('mensaje','Noticia modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $noticia = Noticia::findOrFail($id);
        Noticia::where('id','=',$id)->update(['Activo'=>0]);
        return redirect('noticia')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
        //
        // $noticia = Noticia::findOrFail($id);
        
        // if(Storage::delete('public/'.$noticia->Imagen)){
        //     Noticia::destroy($id);
            
        // }else{Noticia::destroy($id);}
        
        
        // return redirect('noticia')->with('mensaje','Noticia borrada');
    }
}
