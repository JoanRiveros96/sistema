<h1>{{$modo}} Empleado</h1>

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
<label for="Nombre"> Nombre Completo</label>
<input type="text" class="form-control" name="Nombre" value="{{isset($empleado->Nombre)?$empleado->Nombre:old('Nombre')}}" id="Nombre"> 

</div>

<div class="form-group">
<label for="Correo"> Correo </label>
<input type="text" class="form-control" name="Correo" value="{{isset($empleado->Correo)?$empleado->Correo:old('Correo')}}" id="Correo">

</div>

<div class="form-group">
<label for="Descripcion"> Descripcion </label>

<textarea   cols="135" rows="10" class="form-control" name="Descripcion"  id="Descripcion" >
<?php echo isset($empleado->Descripcion)?$empleado->Descripcion:old('Descripcion')?>
</textarea>


</div>

<div class="form-group">
<label for="Foto">Foto NOTA: Dimensiones minimas de la imagen (350px * 350px)</label>
<br>
@if(isset($empleado->Foto))
<img class="img-thumbnail img-fluid" src="../../../storage/app/public/<?php echo $empleado->Foto?>" alt=""style=" width:350px;height:350px" > 
@endif
<input type="file" class="form-control" name="Foto" value="" id="Foto">

</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('empleado')}}"> Regresar </a>

<br>