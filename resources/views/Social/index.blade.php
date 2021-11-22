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
<a href="{{ url('social/create')}}" class="btn btn-success"> Registrar Red Social </a>
<br>
<br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>TipoRed</th>
            <th>Link</th>
            
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($socials as $social)
        <tr>
            
            <td>{{$social ->id}}</td>
            <th>{{$social ->TipoRed}}</th>
            <td>{{$social ->Link}}</td>
              
            <td>
                
            <a href="{{url('/social/'.$social->id.'/edit')}}" class="btn btn-warning">
            Editar
            </a>
            

            <form action="{{url('/social/'.$social->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $socials->links() !!}
</div>
@endsection