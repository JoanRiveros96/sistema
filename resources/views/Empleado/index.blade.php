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
<a href="{{ url('empleado/create')}}" class="btn btn-primary btn-lg"> Registro nuevo </a>
<br><br>
<span>A continuacion, la informacion que se encuentre en la fila cuyo valor en el campo "Activo" 
      sea uno (1) y el color sea verde; será la información que se encuentre visible en la vitrina
</span>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Activo</th>
            <th>Foto</th>
            <th>Nombre</th>            
            <th>Dependencia</th>
            <th>Descripcion</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>

            <?php 
                if ( $empleado->Activo ==1 ) { ?>
                    <td style="text-align:center;background:#A1F367" >{{$empleado ->Activo}}</td>
                <?php }

                else{ ?>
                    <td style="text-align:center;background:#F36767" >{{$empleado ->Activo}}</td>
                <?php }
               

            ?>

        

            <td>
                <img class="img-thumbnail img-fluid" src="../storage/app/public/<?php echo $empleado->Foto?>"  width="200" alt="">
                
            </td>

            
            <td>{{$empleado ->Nombre}}</td>            
            <td>{{$empleado ->Dependencia}}</td>
            <td>{{$empleado ->Descripcion}}</td>
            <td>{{$empleado ->Correo}}</td>

            <?php if( $empleado ->Activo == 1){ ?> 
            <td>
                
            <a href="{{url('/empleado/'.$empleado->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/empleado/'.$empleado->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
            <?php } ?>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $empleados->links() !!}
</div>
@endsection