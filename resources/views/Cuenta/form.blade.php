<h1>{{$modo}} Rendicion de Cuentas</h1>

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
<input type="date" class="form-control" name="Fecha" value="{{isset($cuenta->Fecha)?$cuenta->Fecha:old('Fecha')}}" id="Fecha">

</div>

<div class="form-group">
<label for="Titulo"> Titulo </label>
<input type="text" class="form-control" name="Titulo" value="{{isset($cuenta->Titulo)?$cuenta->Titulo:old('Titulo')}}" id="Titulo">

</div>

<div class="form-group">
<label for="Contenido"> Contenido </label>

<textarea   cols="135" rows="10" class="form-control" name="Contenido"  id="Contenido" >
<?php echo isset($cuenta->Contenido)?$cuenta->Contenido:old('Contenido')?>
</textarea>


</div>

<div class="form-group">
<label for="Imagen">Imagen</label>

@if(isset($cuenta->Imagen))
<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$cuenta->Imagen }}" alt="" width="300" > 
@endif
<input type="file" class="form-control" name="Imagen" value="" id="Imagen">

</div>

<div class="form-group">
<label for="Documento">Documento</label>

@if(isset($cuenta->Documento))
<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$cuenta->Documento }}" alt="" width="300" > 
@endif
<input type="file" class="form-control" name="Documento" value="" id="Documento">

</div>



<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('cuenta')}}"> Regresar </a>

<br>