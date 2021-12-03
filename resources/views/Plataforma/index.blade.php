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
<a href="{{ url('plataforma/create')}}" class="btn btn-primary btn-lg"> Registrar Plataforma </a>
<br>
<br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
               
            <th>Titulo</th>               
            <th>Descripcion</th>
            <th>Link</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($plataformas as $plataforma)
        <tr>
            
            
            <th>{{$plataforma ->Titulo}}</th>
            <td>{{$plataforma ->Descripcion}}</td>        
            <td>{{$plataforma ->Link}}</td>
            
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
        </tr>
        @endforeach
    </tbody>

</table>
{!! $plataformas->links() !!}
</div>
@endsection