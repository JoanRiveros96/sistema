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
<a href="{{ url('programador/create')}}" class="btn btn-primary btn-lg"> Registrar Programador </a>
<br>
<br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
                  
            
            <th>Link</th>
            <th>Descripcion</th>
            
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($programadors as $programador)
        <tr>

            <td><a href="{{$programador->Link}}">{{$programador->Link}}</a></td>
            <td>{{$programador ->Descripcion}}</td>
            
            
           
            
            <td>
                
            <a href="{{url('/programador/'.$programador->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/programador/'.$programador->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $programadors->links() !!}
</div>
@endsection