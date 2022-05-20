<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['banners']=Banner::paginate(5);
        return view('Banner.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Imagen' =>'required|max:10000|mimes:jpeg,png,jpg',
            'Link'=>'nullable|string',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Imagen.required'=>'La foto es requerida'

        ];


        $this->validate($request,$campos,$mensaje);
        
        $datosBanner=request()->except('_token');
        

        if($request->hasFile('Imagen')){
            $file=$request->file('Imagen');
            $nombre= $file->getClientOriginalName();
            $datosBanner['Imagen']=$request->file('Imagen')->storeAs('uploads',$nombre, 'public');
        }
       
        $datosBanner['Id_empleado'] = auth()->user()->id; 
        Banner::create($datosBanner);
        
       //return response()->json($datosEmpleado);
       return redirect('banner')->with('mensaje','Banner agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $banner = Banner::findOrFail($id);

        return view('Banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Auditoria = [];
        $imagen = DB::table('banners')->select('Imagen')->where('id','=',$id)->first();
        $campos=[
            'Imagen' =>'max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Imagen.required'=>'La foto es requerida'
        ];
        if($request->hasFile('Imagen')){
            $campos=['Imagen' =>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Imagen.required'=>'La foto es requerida'];
        }
        $this->validate($request,$campos,$mensaje);
        $datosBanner=request()->except(['_token','_method']);
        $datosBanner['Id_empleado'] = auth()->user()->id;
        if($request->hasFile('Imagen')){
            $banner = Banner::findOrFail($id);
            Storage::delete('public/'.$banner->Imagen);
            $datosBanner['Imagen']=$request->file('Imagen')->store('uploads','public');
            $Auditoria['detalles'] = "Ubicacion Imagen: ". $datosBanner['Imagen'] ." link: ". $datosBanner['Link'];
        }
        else{
            $Auditoria['detalles'] = "Ubicacion Imagen: ". $imagen->{'Imagen'} ." link: ". $datosBanner['Link'];
        }
        Banner::where('id','=',$id)->update($datosBanner);
        $auditoria = new AuditoriaController();
        
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "banners";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Actualizacion";
        
        $auditoria->store($Auditoria, $detalleAuditoria);

        return redirect('banner')->with('mensaje','Banner modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $banner = Banner::findOrFail($id);
        Banner::where('id','=',$id)->update(['Activo'=>0]);
        $auditoria = new AuditoriaController();
        $Auditoria = [];
        $detalleAuditoria = [];
        $detalleAuditoria['id_responsable']= auth()->user()->id;
        $detalleAuditoria['nombre_tabla']= "banners";
        $detalleAuditoria['id_tabla']= (int)$id;
        // codigo de actualizacion = 1
        $detalleAuditoria['tipo_modificacion']= "Eliminacion";
        $Auditoria['detalles'] = "Ha sido eliminada la informacion en banners, cambio de estado Activo a cero (0)";
        $auditoria->store($Auditoria, $detalleAuditoria);
        return redirect('banner')->with('mensaje','Cambio de estado a inactivo, no visible en vitrina');
        
    }
}
