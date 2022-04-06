<h1>{{$modo}} Egresado</h1>

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
<label for="AñoGrado"> Año </label>
<input type="text" class="form-control" name="AñoGrado" value="{{isset($egresado->AñoGrado)?$egresado->AñoGrado:old('AñoGrado')}}" id="AñoGrado">

</div>

<div class="form-group">
<label for="Nombre"> Nombre </label>
<input type="text" class="form-control" name="Nombre" value="{{isset($egresado->Nombre)?$egresado->Nombre:old('Nombre')}}" id="Nombre">

</div>

<div class="form-group">
<label for="Afinidad"> Afinidad </label>

<textarea   cols="135" rows="10" class="form-control" name="Afinidad"  id="Afinidad" >
<?php echo isset($egresado->Afinidad)?$egresado->Afinidad:old('Afinidad')?>
</textarea>


</div>

<div class="form-group">
<label for="Descripcion"> Descripcion </label>

<textarea   cols="135" rows="10" class="form-control" name="Descripcion"  id="Descripcion" >
<?php echo isset($egresado->Descripcion)?$egresado->Descripcion:old('Descripcion')?>
</textarea>


</div>

<div class="form-group">
<label for="Foto">Foto</label>

@if(isset($egresado->Foto))
<img class="img-thumbnail img-fluid" src="../../../storage/app/public/<?php echo $egresado->Foto?>" alt="" width="300" > 
@endif
<input type="file" class="form-control" name="Foto" value="" id="Foto">

</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('egresado')}}"> Regresar </a>

<br>