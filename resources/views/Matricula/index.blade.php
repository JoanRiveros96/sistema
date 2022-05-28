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
<a href="{{ url('matricula/create')}}" class="btn btn-primary btn-lg"> Registrar Matricula </a>
<br><br>
<span>A continuacion, la informacion que se encuentre en la fila cuyo valor en el campo "Activo" 
      sea uno (1) y el color sea verde; será la información que se encuentre visible en la vitrina
</span>
<br><br>
<table class="table table-light">

			
    <thead class="thead-light">
        <tr>
            <th>Activo</th>      
            <th>Fecha</th>               
            <th>Requisito</th>
            <th>Link</th>
            <th>Costos Educativos</th>
            <th>Listado Utiles</th>
            <th>Uniformes</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($matriculas as $matricula)
        <tr>
        <?php 
                if ( $matricula->Activo ==1 ) { ?>
                    <td style="text-align:center;background:#A1F367" >{{$matricula ->Activo}}</td>
                <?php }

                else{ ?>
                    <td style="text-align:center;background:#F36767" >{{$matricula ->Activo}}</td>
                <?php }
               

            ?>
            
            <th>{{$matricula ->Fecha}}</th>
            <td>{{$matricula ->Requisito}}</td>
            <td><a href="{{$matricula->Link}}">{{$matricula->Link}}</a></td>
            <th>{{$matricula ->Costos}}</th>
            <td>{{$matricula ->Utiles}}</td>
            <td>{{$matricula ->Uniformes}}</td>
            <td>{{$matricula ->name}}</td>
           
            <?php if( $matricula ->Activo == 1){ ?> 
            <td>
                
            <a href="{{url('/matricula/'.$matricula->id.'/edit')}}" class="btn btn-outline-primary btn-lg">
            Editar
            </a>
            

            <form action="{{url('/matricula/'.$matricula->id)}}" class="d-inline" method="post">
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
{!! $matriculas->links() !!}
</div>
@endsection