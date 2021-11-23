<h1>{{$modo}} Colegio Informacion</h1>

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
            
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Misión"> Misión <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Visión"> Visión <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Filosofía"> Filosofía <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Símbolos"> Símbolos <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Organigrama"> Email <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Fines y Objetivos"> Fines y Objetivos <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Valores"> Valores <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Estrategia Pedagógica"> Estrategia Pedagógica <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Manual de Convivencia"> Manual de Convivencia <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Gestión de calidad"> Gestión de calidad <br>
           
</div>



<div class="form-group">
<label for="Informacion"> Informacion </label>
<input type="text" class="form-control" name="Informacion" value="{{isset($colegio->Informacion)?$colegio->Informacion:old('Informacion')}}" id="Informacion">

</div>

<div class="form-group">
<label for="Imagen">Imagen</label>

@if(isset($colegio->Imagen))
<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$colegio->Imagen }}" alt="" width="300" > 
@endif
<input type="file" class="form-control" name="Imagen" value="" id="Imagen">

</div>

<div class="form-group">
<label for="Link"> Link </label>
<input type="text" class="form-control" name="Link" value="{{isset($colegio->Link)?$colegio->Link:old('Link')}}" id="Link">

</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('colegio')}}"> Regresar </a>

<br>

