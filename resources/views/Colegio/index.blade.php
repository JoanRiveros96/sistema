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
<a href="{{ url('colegio/create')}}" class="btn btn-primary btn-lg"> Registrar Colegio Informacion </a>
<br>
<br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
                 
            <th>TipoInfo</th>               
            <th>Informacion</th>
            <th>Imagen</th>
            <th>Link</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($colegios as $colegio)
        <tr>
            
            
            <th>{{$colegio ->TipoInfo}}</th>
            <td>{{$colegio ->Informacion}}</td>
            
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$colegio->Imagen }}"  width="200" alt="">
                
            </td>

            <td>{{$colegio ->Link}}</td>
            
            <td>
                
            <a href="{{url('/colegio/'.$colegio->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/colegio/'.$colegio->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $colegios->links() !!}
</div>
@endsection