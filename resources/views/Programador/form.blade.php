<h1>{{$modo}} Programador</h1>

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
<label for="Link"> Link </label>
<input type="text" class="form-control" name="Link" value="{{isset($programador->Link)?$programador->Link:old('Link')}}" id="Link">

</div>

<div class="form-group">
<label for="Descripcion"> Descripcion </label>
<input type="text" class="form-control" name="Descripcion" value="{{isset($programador->Descripcion)?$programador->Descripcion:old('Descripcion')}}" id="Descripcion">

</div>






<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('programador')}}"> Regresar </a>

<br>