@extends('layouts.app')

@section('content')
<div style ="width:90%; padding:0 100px 0">

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
<a href="{{ url('admision/create')}}" class="btn btn-primary btn-lg" > Registrar Admision </a>
<br><br>
<span>A continuacion, la informacion que se encuentre en la fila cuyo valor en el campo "Activo" 
      sea uno (1) y el color sea verde; será la información que se encuentre visible en la vitrina
</span>
<br>
<br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
            <th>Activo</th>      
            <th>Fecha</th>               
            <th>Requisito</th>
            <th>Link</th>
            <th>Usuario</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($admisiones as $admision)
        <tr >
            <?php 
                if ( $admision->Activo ==1 ) { ?>
                    <th style="text-align:center;background:#A1F367" >{{$admision ->Activo}}</th>
                <?php }

                else{ ?>
                    <th style="text-align:center;background:#F36767" >{{$admision ->Activo}}</th>
                <?php }
               

            ?>
            
            <th>{{$admision ->Fecha}}</th>
            <td>{{$admision ->Requisito}}</td>
            <td><a href="{{$admision->Link}}">{{$admision->Link}}</a></td>
            <td>{{$admision ->name}}</td>


            
            
           
            <?php if( $admision ->Activo == 1){ ?> 

            <td>
                
            <a href="{{url('/admision/'.$admision->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/admision/'.$admision->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
        
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
             <?php } ?>


        </tr>
        @endforeach
    </tbody>

</table>
{!! $admisiones->links() !!}
</div>
@endsection