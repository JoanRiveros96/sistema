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
<a href="{{ url('matricula/create')}}" class="btn btn-success"> Registrar Matricula </a>
<br>
<br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
                  
            <th>Fecha</th>               
            <th>Requisito</th>
            <th>Link</th>
            <th>Costos Educativos</th>
            <th>Listado Utiles</th>
            <th>Uniformes</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($matriculas as $matricula)
        <tr>
            
            
            <th>{{$matricula ->Fecha}}</th>
            <td>{{$matricula ->Requisito}}</td>
            <td>{{$matricula ->Link}}</td>
            <th>{{$matricula ->Costos}}</th>
            <td>{{$matricula ->Utiles}}</td>
            <td>{{$matricula ->Uniformes}}</td>
            
           
            
            <td>
                
            <a href="{{url('/matricula/'.$matricula->id.'/edit')}}" class="btn btn-warning">
            Editar
            </a>
            

            <form action="{{url('/matricula/'.$matricula->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $matriculas->links() !!}
</div>
@endsection