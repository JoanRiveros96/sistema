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
<a href="{{ url('comunicado/create')}}" class="btn btn-primary btn-lg"> Registrar Comunicado </a>
<br>
<br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
            
            <th>Fecha</th>
            <th>Titulo</th>
            <th>Contenido</th>
            <th>Imagen</th>
            <th>Link</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comunicados as $comunicado)
        <tr>
            
            
            <th>{{$comunicado ->Fecha}}</th>
            <td>{{$comunicado ->Titulo}}</td>
            <td>{{$comunicado ->Contenido}}</td>

            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$comunicado->Imagen }}"  width="200" alt="">
                
            </td>

            <td><a href="{{$comunicado->Link}}">{{$comunicado->Link}}</a></td>
            
            
            <td>
                
            <a href="{{url('/comunicado/'.$comunicado->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/comunicado/'.$comunicado->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $comunicados->links() !!}
</div>
@endsection