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
<label for="Año"> Año </label>
<input type="text" class="form-control" name="Año" value="{{isset($historia->Año)?$historia->Año:old('Año')}}" id="Año">

</div>


<div class="form-group">
<label for="Contenido"> Informacion </label>
<input type="text" class="form-control" name="Informacion" value="{{isset($historia->Informacion)?$historia->Informacion:old('Informacion')}}" id="Informacion">

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