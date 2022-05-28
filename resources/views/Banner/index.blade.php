@extends('layouts.app')

@section('content')
<div style ="width:100%; padding:0 100px 0">

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
<br><br>
<span>A continuacion, la informacion que se encuentre en la fila cuyo valor en el campo "Activo" 
      sea uno (1) y el color sea verde; será la información que se encuentre visible en la vitrina
</span>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr style="text-align:center">
            <th>Activo</th>
            <th>Imagen</th>
            <th>Link</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($banners as $banner)
        <tr>
            <?php 
                if ( $banner->Activo ==1 ) { ?>
                    <td style="text-align:center;background:#A1F367" >{{$banner ->Activo}}</td>
                <?php }

                else{ ?>
                    <td style="text-align:center;background:#F36767" >{{$banner ->Activo}}</td>
                <?php }
               

            ?>
            <td style="width:300px; height:150px; text-align:center">
                <img class="img-thumbnail img-fluid" src="../storage/app/public/{{$banner->Imagen}}"  width="300" alt="">
                
            </td>

            <td><a href="{{$banner->Link}}">{{$banner->Link}}</a></td>
            <td>{{$banner ->name}}</td>
            <?php if( $banner ->Activo == 1){ ?> 

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
            <?php } ?>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $banners->links() !!}
</div>
@endsection