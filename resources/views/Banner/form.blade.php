<h1>{{$modo}} Banner</h1>

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
<label for="Imagen">Imagen. NOTA: subir imagen con dimensiones maximas de 1875px * 480px</label>
<br>
@if(isset($banner->Imagen))
<img class="img-thumbnail img-fluid" src="../../../storage/app/public/<?php echo $banner->Imagen?>" alt="" width="300" > 
@endif
<input type="file" class="form-control" id="Imagen" name="Imagen" value="" >

</div>

<div class="form-group">
<label for="Link"> Link </label>
<input type="text" class="form-control" name="Link" value="{{isset($banner->Link)?$banner->Link:old('Link')}}" id="Link">

</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos" >


<a class="btn btn-primary" href="{{ url('banner')}}"> Regresar </a>

<br>