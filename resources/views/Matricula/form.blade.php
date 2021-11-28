<h1>{{$modo}} Matriculas</h1>

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
<input type="date" class="form-control" name="Fecha" value="{{isset($matricula->Fecha)?$matricula->Fecha:old('Fecha')}}" id="Fecha">

</div>


<div class="form-group">
<label for="Requisito"> Requisito </label>
<input type="text" class="form-control" name="Requisito" value="{{isset($matricula->Requisito)?$matricula->Requisito:old('Requisito')}}" id="Requisito">

</div>

<div class="form-group">
<label for="Link"> Link </label>
<input type="text" class="form-control" name="Link" value="{{isset($matricula->Link)?$matricula->Link:old('Link')}}" id="Link">

</div>

<div class="form-group">
<label for="Costos"> Costos </label>
<input type="text" class="form-control" name="Costos" value="{{isset($matricula->Costos)?$matricula->Costos:old('Costos')}}" id="Costos">

</div>

<div class="form-group">
<label for="Utiles"> Utiles </label>
<input type="text" class="form-control" name="Utiles" value="{{isset($matricula->Utiles)?$matricula->Utiles:old('Utiles')}}" id="Utiles">

</div>

<div class="form-group">
<label for="Uniformes"> Uniformes </label>
<input type="text" class="form-control" name="Uniformes" value="{{isset($matricula->Uniformes)?$matricula->Uniformes:old('Uniformes')}}" id="Uniformes">

</div>


<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('matricula')}}"> Regresar </a>

<br>