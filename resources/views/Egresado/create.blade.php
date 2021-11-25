@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/egresado')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('egresado.form',['modo'=>'Crear'])



</form>
</div>
@endsection