<h1>{{$modo}} Programador</h1>

 @if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
    @foreach( $errors->all() as $error)
     <li>   {{ $error }}  </li>

    @endforeach
    </ul>
    </div>
@endif 


<div class="form-group">
<label for="Link"> Imagen - NOTA: Debe tener en cuenta que el archivo a subir debe tener el formato de dos digitos, por ejemplo, 02.jpg; en dado caso seria la imagen para el mes de Febrero y 03 para el mes de Marzo </label>

@if(isset($programador->Imagen))
<img class="img-thumbnail img-fluid" src="../../../storage/app/public/<?php echo $programador->Imagen?>" alt="" width="300" > 
@endif
<input type="file" class="form-control" name="Imagen" value="{{isset($programador->Imagen)?$programador->Imagen:old('Imagen')}}" id="Imagen">




</div>








<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('programador')}}"> Regresar </a>

<br>