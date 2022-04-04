@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/evento')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('Evento.form',['modo'=>'Crear'])



</form>
</div>
@endsection