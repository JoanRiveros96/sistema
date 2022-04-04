@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/cuenta')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('Cuenta.form',['modo'=>'Crear'])



</form>
</div>
@endsection