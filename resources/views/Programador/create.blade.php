@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/programador')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('Programador.form',['modo'=>'Crear'])



</form>
</div>
@endsection