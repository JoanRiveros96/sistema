<h1>{{$modo}} Comunicado</h1>

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
<input type="date" class="form-control" name="Fecha" value="{{isset($comunicado->Fecha)?$comunicado->Fecha:old('Fecha')}}" id="Fecha">

</div>

<div class="form-group">
<label for="Titulo"> Titulo </label>
<input type="text" class="form-control" name="Titulo" value="{{isset($comunicado->Titulo)?$comunicado->Titulo:old('Titulo')}}" id="Titulo">

</div>

<div class="form-group">
<label for="Contenido"> Contenido </label>
<input type="text" class="form-control" name="Contenido" value="{{isset($comunicado->Contenido)?$comunicado->Contenido:old('Contenido')}}" id="Contenido">

</div>


<div class="form-group">
<label for="Imagen"></label>

@if(isset($comunicado->Imagen))
<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$comunicado->Imagen }}" alt="" width="300" > 
@endif
<input type="file" class="form-control" name="Imagen" value="{{isset($comunicado->Imagen)?$comunicado->Imagen:old('Imagen')}}" id="Imagen">

</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('comunicado')}}"> Regresar </a>

<br>