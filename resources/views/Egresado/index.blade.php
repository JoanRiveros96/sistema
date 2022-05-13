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
<a href="{{ url('egresado/create')}}" class="btn btn-primary btn-lg"> Registrar Egresado </a>
<br><br>
<span>A continuacion, la informacion que se encuentre en la fila cuyo valor en el campo "Activo" 
      sea uno (1) y el color sea verde; será la información que se encuentre visible en la vitrina
</span>
<br><br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
            <th>Activo</th>      
            <th>Año Grado</th>               
            <th>Nombre</th>
            <th>Afinidad</th>
            <th>Descripcion</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($egresados as $egresado)
        <tr>
            
            <?php 
                if ( $egresado->Activo ==1 ) { ?>
                    <td style="text-align:center;background:#A1F367" >{{$egresado ->Activo}}</td>
                <?php }

                else{ ?>
                    <td style="text-align:center;background:#F36767" >{{$egresado ->Activo}}</td>
                <?php }
               

            ?>
            <th>{{$egresado ->AñoGrado}}</th>
            <td>{{$egresado ->Nombre}}</td>
            <td>{{$egresado ->Afinidad}}</td>
            <td>{{$egresado ->Descripcion}}</td>

            
            <td>
                <img class="img-thumbnail img-fluid" src="../storage/app/public/<?php echo $egresado->Foto?>"  width="200" alt="">
                
            </td>
            
            <td>
                
            <a href="{{url('/egresado/'.$egresado->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/egresado/'.$egresado->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $egresados->links() !!}
</div>
@endsection