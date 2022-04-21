<h1>{{$modo}} Historia</h1>

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
<label for="Anio"> Anio </label>
<input type="text" class="form-control" name="Anio" value="{{isset($historia->Anio)?$historia->Anio:old('Anio')}}" id="Anio">

</div>


<div class="form-group">
<label for="Informacion"> Informacion </label>

<textarea   cols="135" rows="10" class="form-control" name="Informacion"  id="Informacion" >
<?php echo isset($historia->Informacion)?$historia->Informacion:old('Informacion')?>
</textarea>


</div>

<div class="form-group">
<label for="Imagen">Imagen</label>

@if(isset($historia->Imagen))
<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$historia->Imagen }}" alt="" width="300" > 
@endif
<input type="file" class="form-control" name="Imagen" value="" id="Imagen">

</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('historia')}}"> Regresar </a>

<br>