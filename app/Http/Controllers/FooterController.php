<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        $Auditoria = [];
        $imagen = DB::table('footers')->select('Imagen')->where('id','=',$id)->first();
        $tipoFoot =DB::table('footers')->select('TipoFoot')->where('id','=',$id)->first();
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
            $Auditoria['detalles'] = "Tipo Foot: ". $tipoFoot->{'TipoFoot'}." Contenido: ". $datosFooter['Contenido'] ." Imagen: " .$datosFooter["Imagen"];
        }else{
            $Auditoria['detalles'] = "Tipo Foot: ". $tipoFoot->{'TipoFoot'} ." Contenido: ". $datosFooter['Contenido'] ." Imagen: " .$imagen->{'Imagen'};

        }


        Footer::where('id','=',$id)->update($datosFooter);
        $auditoria = new AuditoriaController();

        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "footers";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Actualizacion";
        
        $auditoria->store($Auditoria, $detalleAuditoria);

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

        $auditoria = new AuditoriaController();
        $Auditoria = [];
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "footers";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Eliminacion";
        $Auditoria['detalles'] = "Ha sido eliminada la informacion en footers, cambio de estado Activo a cero (0)";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('footer')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
        
    }
}
