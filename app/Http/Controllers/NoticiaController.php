<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
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
        $datos['noticias']=Noticia::JOIN('users','noticias.Usuario','=','users.id')
        ->select('users.name','noticias.*')
        ->paginate(10);
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
        
        $datosNoticia['Usuario'] = auth()->user()->id; 
        
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
        $Auditoria = [];
        $imagen = DB::table('noticias')->select('Imagen')->where('id','=',$id)->first();
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
        $datosNoticia['Usuario'] = auth()->user()->id; 

        if($request->hasFile('Imagen')){
            $noticia = Noticia::findOrFail($id);
            Storage::delete('public/'.$noticia->Imagen);
            $datosNoticia['Imagen']=$request->file('Imagen')->store('uploads','public');
            $Auditoria['detalles'] = "Fecha: ". $datosNoticia['Fecha'] ." Titulo: ". $datosNoticia['Titulo'] ." Contenido: " .$datosNoticia["Contenido"] ." Imagen: " . $datosNoticia['Imagen'] ." Link" . $datosNoticia['Link'];
        }else{
            $Auditoria['detalles'] = "Fecha: ". $datosNoticia['Fecha'] ." Titulo: ". $datosNoticia['Titulo'] ." Contenido: " .$datosNoticia["Contenido"] ." Imagen: " . $imagen->{'Imagen'} ." Link" . $datosNoticia['Link'];

        }


        Noticia::where('id','=',$id)->update($datosNoticia);
        
        $auditoria = new AuditoriaController();

        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "noticias";
        $detalleAuditoria['id_tabla']= (int)$id;
        $detalleAuditoria['tipo_modificacion']= "Actualizacion";
        $auditoria->store($Auditoria, $detalleAuditoria);

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
        
        $auditoria = new AuditoriaController();
        $Auditoria = [];
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "noticias";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Eliminacion";
        $Auditoria['detalles'] = "Ha sido eliminada la informacion en noticias, cambio de estado Activo a cero (0)";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('noticia')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
    }
}
