@extends('layouts.app')

@section('content')
<div class="container">

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
<a href="{{ url('cuenta/create')}}" class="btn btn-primary btn-lg"> Registrar Rendicion de cuentas </a>
<br><br>
<span>A continuacion, la informacion que se encuentre en la fila cuyo valor en el campo "Activo" 
      sea uno (1) y el color sea verde; será la información que se encuentre visible en la vitrina
</span>
<br><br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
            <th>Activo</th>      
            <th>Fecha</th>               
            <th>Titulo</th>
            <th>Contenido</th>
            <th>Imagen</th>
            <th>Documento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cuentas as $cuenta)
        <tr>
            
            <?php 
                if ( $cuenta->Activo ==1 ) { ?>
                    <td style="text-align:center;background:#A1F367" >{{$cuenta ->Activo}}</td>
                <?php }

                else{ ?>
                    <td style="text-align:center;background:#F36767" >{{$cuenta ->Activo}}</td>
                <?php }
               

            ?>
            <th>{{$cuenta ->Fecha}}</th>
            <td>{{$cuenta ->Titulo}}</td>
            <td>{{$cuenta ->Contenido}}</td>
            
            <td>
                <img class="img-thumbnail img-fluid" src="../storage/app/public/<?php echo $cuenta->Imagen?>"  width="200" alt="">
                
            </td>
            <td><a href="{{route('docs.download', $cuenta->id)}}">{{$cuenta->Documento}}</a></td>
            
            <td>
                
            <a href="{{url('/cuenta/'.$cuenta->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/cuenta/'.$cuenta->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $cuentas->links() !!}
</div>
@endsection