@extends('layouts.app')

@section('content')
<div style ="width:100%; padding:0 100px 0">

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
<a href="{{ url('noticia/create')}}" class="btn btn-primary btn-lg"> Registrar noticia </a>
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
            <th>Link</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($noticias as $noticia)
        <tr>
            
            <?php 
                if ( $noticia->Activo ==1 ) { ?>
                    <td style="text-align:center;background:#A1F367" >{{$noticia ->Activo}}</td>
                <?php }

                else{ ?>
                    <td style="text-align:center;background:#F36767" >{{$noticia ->Activo}}</td>
                <?php }
               

            ?>
            <th>{{$noticia ->Fecha}}</th>
            <td>{{$noticia ->Titulo}}</td>
            <td>{{$noticia ->Contenido}}</td>

            <td>
                <img class="img-thumbnail img-fluid" src="../storage/app/public/<?php echo $noticia->Imagen?>"  width="200" alt="">
                
            </td>

            <td><a href="{{$noticia->Link}}">{{$noticia->Link}}</a></td>
            <td>{{$noticia ->name}}</td>
            <?php if( $noticia ->Activo == 1){ ?> 
            <td>
                
            <a href="{{url('/noticia/'.$noticia->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/noticia/'.$noticia->id)}}" class="d-inline" method="post">
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
{!! $noticias->links() !!}
</div>
@endsection