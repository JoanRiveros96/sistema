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
<a href="{{ url('colegio/create')}}" class="btn btn-primary btn-lg"> Registrar Colegio Informacion </a>
<br><br>
<span>A continuacion, la informacion que se encuentre en la fila cuyo valor en el campo "Activo" 
      sea uno (1) y el color sea verde; será la información que se encuentre visible en la vitrina
</span>
<br><br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
            <th>Activo</th>     
            <th>TipoInfo</th>               
            <th>Informacion</th>
            <th>Imagen</th>
            <th>Link</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($colegios as $colegio)
        <tr>
            
            <?php 
                if ( $colegio->Activo ==1 ) { ?>
                    <td style="text-align:center;background:#A1F367" >{{$colegio ->Activo}}</td>
                <?php }

                else{ ?>
                    <td style="text-align:center;background:#F36767" >{{$colegio ->Activo}}</td>
                <?php }
               

            ?>
            <th>{{$colegio ->TipoInfo}}</th>
            <td>{{$colegio ->Informacion}}</td>
            
            <td>
                <img class="img-thumbnail img-fluid" src="../storage/app/public/<?php echo $colegio->Imagen?>"  width="200" alt="">
                
            </td>
            <td><a href="{{$colegio->Link}}">{{$colegio->Link}}</a></td>
            
            <?php if( $colegio ->Activo == 1){ ?> 
            <td>
                
            <a href="{{url('/colegio/'.$colegio->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/colegio/'.$colegio->id)}}" class="d-inline" method="post">
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
{!! $colegios->links() !!}
</div>
@endsection