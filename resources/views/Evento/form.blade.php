<h1>{{$modo}} Evento</h1>

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
<label for="Fecha"> Fecha </label>
<input type="date" class="form-control" name="Fecha" value="{{isset($evento->Fecha)?$evento->Fecha:old('Fecha')}}" id="Fecha">

</div>


<div class="form-group">
<label for="Titulo"> Titulo </label>
<input type="text" class="form-control" name="Titulo" value="{{isset($evento->Titulo)?$evento->Titulo:old('Titulo')}}" id="Titulo">

</div>

<div class="form-group">
<label for="Descripcion"> Descripcion </label>

<textarea   cols="135" rows="10" class="form-control" name="Descripcion"  id="Descripcion" >
<?php echo isset($evento->Descripcion)?$evento->Descripcion:old('Descripcion')?>
</textarea>


</div>


<div class="form-group">
<label for="Imagen">Imagen NOTA: Dimensiones minimas de la imagen (350px * 350px)</label>

@if(isset($evento->Imagen))
<img class="img-thumbnail img-fluid" src="../../../storage/app/public/<?php echo $evento->Imagen?>" alt="" width="300" > 
@endif
<input type="file" class="form-control" name="Imagen" value="" id="Imagen">

</div>

<div class="form-group">
<label for="Link"> Link </label>
<input type="text" class="form-control" name="Link" value="{{isset($evento->Link)?$evento->Link:old('Link')}}" id="Link">

</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('evento')}}"> Regresar </a>

<br>