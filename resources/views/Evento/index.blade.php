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
<a href="{{ url('evento/create')}}" class="btn btn-primary btn-lg"> Registrar Evento </a>
<br>
<br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
                  
            <th>Fecha</th>               
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Link</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($eventos as $evento)
        <tr>
            
            
            <th>{{$evento ->Fecha}}</th>
            <td>{{$evento ->Titulo}}</td>
            <th>{{$evento ->Descripcion}}</th>

            <td>
                <img class="img-thumbnail img-fluid" src="../storage/app/public/<?php echo $evento->Imagen?>"  width="200" alt="">
                
            </td>
            <td><a href="{{$evento->Link}}">{{$evento->Link}}</a></td>
            
            
            
            
            <td>
                
            <a href="{{url('/evento/'.$evento->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/evento/'.$evento->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $eventos->links() !!}
</div>
@endsection