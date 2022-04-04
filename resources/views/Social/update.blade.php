<h1>{{$modo}} Red Social</h1>

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
<input type="text" class="form-control" name="Link" value="{{isset($social->Link)?$social->Link:old('Link')}}" id="Link">

</div>


<input class="btn btn-success" type="submit" value="{{$modo}} datos" >

<a class="btn btn-primary" href="{{ url('social')}}"> Regresar </a>

<br>