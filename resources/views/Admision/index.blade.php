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
<a href="{{ url('admision/create')}}" class="btn btn-success"> Registrar Admision </a>
<br>
<br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
                  
            <th>Fecha</th>               
            <th>Requisito</th>
            <th>Link</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($admisiones as $admision)
        <tr>
            
            
            <th>{{$admision ->Fecha}}</th>
            <td>{{$admision ->Requisito}}</td>
            <td>{{$admision ->Link}}</td>
            
           
            
            <td>
                
            <a href="{{url('/admision/'.$admision->id.'/edit')}}" class="btn btn-warning">
            Editar
            </a>
            

            <form action="{{url('/admision/'.$admision->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $admisiones->links() !!}
</div>
@endsection