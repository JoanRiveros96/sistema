<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['footers']=Footer::paginate(5);
        return view('Footer.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Footer.create');
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
            
            'TipoFoot'=>'required',
            'Contenido'=> 'required|string',
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosFooter=request()->except('_token'); 

        if($request->hasFile('Imagen')){
            $datosFooter['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        else{
            $datosFooter['Imagen'] = '';
        }
        
        $datosFooter['Usuario'] = auth()->user()->id; 
        
        
        Footer::create($datosFooter);
        
       
       return redirect('footer')->with('mensaje','Footer agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function show(Footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $footer = Footer::findOrFail($id);

        return view('Footer.edit',compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            
            
            'Contenido'=> 'required|string',
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

        $datosFooter=request()->except(['_token','_method']);
        $datosFooter['Usuario'] = auth()->user()->id; 

        if($request->hasFile('Imagen')){
            $footer = Footer::findOrFail($id);
            Storage::delete('public/'.$footer->Imagen);
            $datosFooter['Imagen']=$request->file('Imagen')->store('uploads','public');
        }


        Footer::where('id','=',$id)->update($datosFooter);

        $footer = Footer::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('footer')->with('mensaje','Footer modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $footer = Footer::findOrFail($id);
        Footer::where('id','=',$id)->update(['Activo'=>0]);
        return redirect('footer')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
        // //
        // $footer = Footer::findOrFail($id);
        
        // if(Storage::delete('public/'.$footer->Imagen)){     
        //     Footer::destroy($id);            
        // }else{Footer::destroy($id);          
        // }
        
        
        // return redirect('footer')->with('mensaje','Footer borrado');
    }
}
