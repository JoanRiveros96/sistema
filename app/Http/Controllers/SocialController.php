<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['socials']=Social::paginate(5);
        return view('social.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('social.create');
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
            
            'TipoRed'=>'required|string|max:50',
            'Link'=> 'required|string|max:1000',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosSocial=request()->except('_token');        
        $datosSocial['Usuario'] = auth()->user()->name; 
        
        
        Social::create($datosSocial);
        
       
       return redirect('social')->with('mensaje','Red Social agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $social = Social::findOrFail($id);

        return view('social.edit',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'TipoRed'=>'required|string|max:50',
            'Link'=> 'required|string|max:1000',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];


        $this->validate($request,$campos,$mensaje);

        $datosSocial=request()->except(['_token','_method']);


        Social::where('id','=',$id)->update($datosSocial);

        $social = Social::findOrFail($id);
        
        return redirect('social')->with('mensaje','Red Social modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $social = Social::findOrFail($id);
        
        
            social::destroy($id);
            return redirect('social')->with('mensaje','Red Social borrada');
    }
}
