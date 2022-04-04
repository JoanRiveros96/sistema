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
<a href="{{ url('historia/create')}}" class="btn btn-primary btn-lg"> Registrar Historia </a>
<br>
<br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
                  
            <th>Año</th>               
            <th>Informacion</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($historias as $historia)
        <tr>
            
            
            <th>{{$historia ->Año}}</th>
            <td>{{$historia ->Informacion}}</td>
            
            <td>
                <img class="img-thumbnail img-fluid" src="../storage/app/public/<?php echo $historia->Imagen?>"  width="200" alt="">
                
            </td>
            
            <td>
                
            <a href="{{url('/historia/'.$historia->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/historia/'.$historia->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $historias->links() !!}
</div>
@endsection