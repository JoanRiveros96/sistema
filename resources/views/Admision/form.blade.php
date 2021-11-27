<h1>{{$modo}} Admisiones</h1>

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
<input type="date" class="form-control" name="Fecha" value="{{isset($admision->Fecha)?$admision->Fecha:old('Fecha')}}" id="Fecha">

</div>


<div class="form-group">
<label for="Requisito"> Requisito </label>
<input type="text" class="form-control" name="Requisito" value="{{isset($historia->Requisito)?$historia->Requisito:old('Requisito')}}" id="Requisito">

</div>

<div class="form-group">
<label for="Link"> Link </label>
<input type="text" class="form-control" name="Link" value="{{isset($admision->Link)?$admision->Link:old('Link')}}" id="Link">

</div>


<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('adfmision')}}"> Regresar </a>

<br>