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
<a href="{{ url('noticia/create')}}" class="btn btn-success"> Registrar noticia </a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Titulo</th>
            <th>Contenido</th>
            <th>Imagen</th>
            <th>Link</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($noticias as $noticia)
        <tr>
            <td>{{$noticia ->id}}</td>
            <td>{{$noticia ->Fecha}}</td>
            <td>{{$noticia ->Titulo}}</td>
            <td>{{$noticia ->Contenido}}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$noticia->Imagen }}"  width="200" alt="">
                
            </td>

            
            <td>{{$noticia ->Link}}</td>
            
            <td>
                
            <a href="{{url('/noticia/'.$noticia->id.'/edit')}}" class="btn btn-warning">
            Editar
            </a>
            

            <form action="{{url('/noticia/'.$noticia->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $noticias->links() !!}
</div>
@endsection