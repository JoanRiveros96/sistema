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
<a href="{{ url('banner/create')}}" class="btn btn-primary btn-lg"> Registrar banner </a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            
            <th>Imagen</th>
            <th>Link</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($banners as $banner)
        <tr>
            

            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$banner->Imagen }}"  width="200" alt="">
                
            </td>

            <td><a href="{{$banner->Link}}">{{$banner->Link}}</a></td>
            
            
            <td>
                
            <a href="{{url('/banner/'.$banner->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/banner/'.$banner->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-outline-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $banners->links() !!}
</div>
@endsection