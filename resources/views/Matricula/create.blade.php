@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/matricula')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('Matricula.form',['modo'=>'Crear'])



</form>
</div>
@endsection