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

<textarea   cols="135" rows="10" class="form-control" name="Requisito"  id="Requisito" >
<?php echo isset($matricula->Requisito)?$matricula->Requisito:old('Requisito')?>
</textarea>


</div>

<div class="form-group">
<label for="Link"> Link </label>
<input type="text" class="form-control" name="Link" value="{{isset($matricula->Link)?$matricula->Link:old('Link')}}" id="Link">

</div>

<div class="form-group">
<label for="Costos"> Costos </label>

<textarea   cols="135" rows="10" class="form-control" name="Costos"  id="Costos" >
<?php echo isset($matricula->Costos)?$matricula->Costos:old('Costos')?>
</textarea>


</div>

<div class="form-group">
<label for="Utiles"> Utiles </label>

<textarea   cols="135" rows="10" class="form-control" name="Utiles"  id="Utiles" >
<?php echo isset($matricula->Utiles)?$matricula->Utiles:old('Utiles')?>
</textarea>


</div>

<div class="form-group">
<label for="Uniformes"> Uniformes </label>

<textarea   cols="135" rows="10" class="form-control" name="Uniformes"  id="Uniformes" >
<?php echo isset($matricula->Uniformes)?$matricula->Uniformes:old('Uniformes')?>
</textarea>


</div>


<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('matricula')}}"> Regresar </a>

<br>