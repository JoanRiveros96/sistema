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
                <input type="radio" name="TipoInfo" id="TipoInfo" value="HIMNO DEL COLEGIO INTEGRADO NUESTRA SEÑORA DEL DIVINO AMOR"> HIMNO DEL COLEGIO INTEGRADO NUESTRA SEÑORA DEL DIVINO AMOR <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Bandera del Colegio"> Bandera del colegio <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Escudo del Colegio"> Escudo del Colegio <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Organigrama"> Organigrama <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Fines y Objetivos Institucionales"> Fines y Objetivos Institucionales <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Valores y Principios pedagógicos"> Valores y Principios pedagógicos <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Estrategia Pedagógica"> Estrategia Pedagógica <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Manual de Convivencia"> Manual de Convivencia <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Gestión y Política de calidad"> Gestión y Política de calidad <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Perfil del estudiante"> Perfil del estudiante <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Perfil Docente"> Perfil Docente <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Fundamentos Evaluativos"> Fundamentos Evaluativos <br>
                <input type="radio" name="TipoInfo" id="TipoInfo" value="Horario de atención a Padres"> Horario de atención a Padres <br>
           
</div>



<div class="form-group">
<label for="Informacion"> Informacion </label>

<textarea   cols="135" rows="10" class="form-control" name="Informacion"  id="Informacion" >
<?php echo isset($colegio->Informacion)?$colegio->Informacion:old('Informacion')?>
</textarea>

</div>

<div class="form-group">
<label for="Imagen">Imagen NOTA: Dimensiones minimas de la imagen (350px * 350px)</label>

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

