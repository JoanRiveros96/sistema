<h1>{{$modo}} Plataformas</h1>

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
<label for="Descripcion"> Descripcion </label>

<textarea   cols="135" rows="10" class="form-control" name="Descripcion"  id="Descripcion" >
<?php echo isset($plataforma->Descripcion)?$plataforma->Descripcion:old('Descripcion')?>
</textarea>

</div>


<div class="form-group">
<label for="Link"> Link </label>
<input type="text" class="form-control" name="Link" value="{{isset($plataforma->Link)?$plataforma->Link:old('Link')}}" id="Link">

</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('plataforma')}}"> Regresar </a>

<br>