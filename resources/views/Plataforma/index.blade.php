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
<a href="{{ url('plataforma/create')}}" class="btn btn-primary btn-lg"> Registrar Plataforma </a>
<br><br>
<span>A continuacion, la informacion que se encuentre en la fila cuyo valor en el campo "Activo" 
      sea uno (1) y el color sea verde; será la información que se encuentre visible en la vitrina
</span>
<br><br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
            <th>Activo</th>   
            <th>Titulo</th>               
            <th>Descripcion</th>
            <th>Link</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($plataformas as $plataforma)
        <tr>
            
            <?php 
                if ( $plataforma->Activo ==1 ) { ?>
                    <td style="text-align:center;background:#A1F367" >{{$plataforma ->Activo}}</td>
                <?php }

                else{ ?>
                    <td style="text-align:center;background:#F36767" >{{$plataforma ->Activo}}</td>
                <?php }
               

            ?>
            <th>{{$plataforma ->Titulo}}</th>
            <td>{{$plataforma ->Descripcion}}</td>
            <td><a href="{{$plataforma->Link}}">{{$plataforma->Link}}</a></td>        
            <td>{{$plataforma ->name}}</td>
            <?php if( $plataforma ->Activo == 1){ ?> 
            <td>
                
            <a href="{{url('/plataforma/'.$plataforma->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/plataforma/'.$plataforma->id)}}" class="d-inline" method="post">
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
{!! $plataformas->links() !!}
</div>
@endsection