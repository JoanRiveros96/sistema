<h1>{{$modo}} Noticia</h1>

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
<input type="date" class="form-control" name="Fecha" value="{{isset($noticia->Fecha)?$noticia->Fecha:old('Fecha')}}" id="Fecha">

</div>

<div class="form-group">
<label for="Titulo"> Titulo </label>
<input type="text" class="form-control" name="Titulo" value="{{isset($noticia->Titulo)?$noticia->Titulo:old('Titulo')}}" id="Titulo">

</div>

<div class="form-group">
<label for="Contenido"> Contenido </label>

<textarea   cols="135" rows="10" class="form-control" name="Contenido"  id="Contenido" >
<?php echo isset($noticia->Contenido)?$noticia->Contenido:old('Contenido')?>
</textarea>


</div>


<div class="form-group">
<label for="Imagen">Imagen. NOTA: Dimensiones minimas de la imagen (350px * 350px)</label><br>

@if(isset($noticia->Imagen))
<img class="img-thumbnail img-fluid" src="../../../storage/app/public/<?php echo $noticia->Imagen?>" alt="" width="300" > 
@endif
<input type="file" class="form-control" name="Imagen" value="{{isset($noticia->Imagen)?$noticia->Imagen:old('Imagen')}}" id="Imagen">

</div>

<div class="form-group">
<label for="Link"> Link </label>
<input type="text" class="form-control" name="Link" value="{{isset($noticia->Link)?$noticia->Link:old('Link')}}" id="Link">

</div>



<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('noticia')}}"> Regresar </a>

<br>