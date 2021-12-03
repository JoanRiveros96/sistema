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
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
       
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
        

            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$empleado->Foto }}"  width="200" alt="">
                
            </td>

            
            <td>{{$empleado ->Nombre}}</td>            
            <td>{{$empleado ->Dependencia}}</td>
            <td>{{$empleado ->Descripcion}}</td>
            <td>{{$empleado ->Correo}}</td>
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
        </tr>
        @endforeach
    </tbody>
</table>
{!! $empleados->links() !!}
</div>
@endsection