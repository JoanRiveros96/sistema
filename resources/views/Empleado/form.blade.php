<h1>{{$modo}} Empleado</h1>

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
<label for="Nombre"> Nombre Completo</label>
<input type="text" class="form-control" name="Nombre" value="{{isset($empleado->Nombre)?$empleado->Nombre:old('Nombre')}}" id="Nombre"> 

</div>

<div class="form-group"><h3>
    Dependencia
</h3> 
        
                <input type="radio" name="Dependencia" id="Dependencia" value="Rectoría"> Rectoría <br>
                <input type="radio" name="Dependencia" id="Dependencia" value="Coordinación Académica"> Coordinación Académica <br>
                <input type="radio" name="Dependencia" id="Dependencia" value="Bienestar Estudiantil"> Bienestar Estudiantil <br>
                <input type="radio" name="Dependencia" id="Dependencia" value="Psicología"> Psicología <br>
                <input type="radio" name="Dependencia" id="Dependencia" value="Biblioteca"> Biblioteca <br>
                <input type="radio" name="Dependencia" id="Dependencia" value="Primeros Auxilios"> Primeros Auxilios <br>
                <input type="radio" name="Dependencia" id="Dependencia" value="Contabilidad"> Contabilidad <br>
                <input type="radio" name="Dependencia" id="Dependencia" value="Portería"> Portería <br>
                <input type="radio" name="Dependencia" id="Dependencia" value="Laboratorios"> Laboratorios <br>
                <input type="radio" name="Dependencia" id="Dependencia" value="Secretaría"> Secretaría <br>
                <input type="radio" name="Dependencia" id="Dependencia" value="Sistemas"> Sistemas <br>
                <input type="radio" name="Dependencia" id="Dependencia" value="Cafetería"> Cafetería <br>
                <input type="radio" name="Dependencia" id="Dependencia" value="Docente Primaria"> Docente Primaria <br>
                <input type="radio" name="Dependencia" id="Dependencia" value="Docente Secundaria"> Docente Secundaria <br>
                
           
</div>

<div class="form-group">
<label for="Correo"> Correo </label>
<input type="text" class="form-control" name="Correo" value="{{isset($empleado->Correo)?$empleado->Correo:old('Correo')}}" id="Correo">

</div>



<div class="form-group">
<label for="Descripcion"> Descripcion </label>
<input type="text" class="form-control" name="Descripcion"  value="{{isset($empleado->Descripcion)?$empleado->Descripcion:old('Descripcion')}}" id="Descripcion">

</div>

<div class="form-group">
<label for="Foto">Foto</label>
<br>
@if(isset($empleado->Foto))
<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$empleado->Foto }}" alt="" width="300" > 
@endif
<input type="file" class="form-control" name="Foto" value="" id="Foto">

</div>

<!-- <div class="form-group">
<label for="Correo"> Correo </label>
<input type="text" class="form-control" name="Correo" value="{{isset($empleado->Correo)?$empleado->Correo:old('Correo')}}" id="Correo">

</div> -->



<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('empleado')}}"> Regresar </a>

<br>

