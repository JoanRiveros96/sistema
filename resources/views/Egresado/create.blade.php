@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/egresado')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('Egresado.form',['modo'=>'Crear'])



</form>
</div>
@endsection