@extends('layouts.app')

@section('content')
<div  style ="width:100%; padding:0 100px 0">

<br>



@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{Session::get('mensaje')}}
<button type="button" class="close" data-dismiss="alert" aria-label="close">
    <span aria-hidden =true>&times;</span>
</button>
</div>

@endif




<br>
<h1> AUDITORIAS</h1>

<br>
<br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
            <th>MODIFICADO POR</th>      
            <th>TABLA MODIFICADA</th>               
            <th>ACCION</th>
            <th>DETALLES</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($auditorias as $auditoria)
        <tr >
            
            <th>{{$auditoria->name}}</th>
            <th>{{$auditoria->nombre_tabla}}</th>

            <?php 
                if ( $auditoria->tipo_modificacion == "Actualizacion") { ?>
                    <th style="text-align:center;background:#6DA6FE" >{{$auditoria->tipo_modificacion}}</th>
                <?php }

                else{ ?>
                    <th style="text-align:center;background:#F36767" >{{$auditoria->tipo_modificacion}}</th>
                <?php }
               

            ?>

            
            <th>{{$auditoria->detalles}}</th>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $auditorias->links() !!}
</div>
@endsection