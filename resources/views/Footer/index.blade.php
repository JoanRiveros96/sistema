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
<a href="{{ url('footer/create')}}" class="btn btn-primary btn-lg"> Registrar Footer </a>
<br>
<br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
                 
            <th>TipoFoot</th>               
            <th>Contenido</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($footers as $footer)
        <tr>
            
            
            <th>{{$footer ->TipoFoot}}</th>
            <td>{{$footer ->Contenido}}</td>
            
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$footer->Imagen }}"  width="200" alt="">
                
            </td>
            
            <td>
                
            <a href="{{url('/footer/'.$footer->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/footer/'.$footer->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $footers->links() !!}
</div>
@endsection