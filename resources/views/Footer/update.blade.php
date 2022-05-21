<h1>{{$modo}} Footer</h1>

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
<label for="Contenido"> Contenido </label>
<input type="text" class="form-control" name="Contenido" value="{{isset($footer->Contenido)?$footer->Contenido:old('Contenido')}}" id="Contenido">

</div>

<div class="form-group">
<label for="Imagen">Imagen</label>

@if(isset($footer->Imagen))
<img class="img-thumbnail img-fluid" src="../../../storage/app/public/<?php echo $footer->Imagen?>" alt="" width="300" > 
@endif
<input type="file" class="form-control" name="Imagen" value="" id="Imagen">

</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('footer')}}"> Regresar </a>

<br>