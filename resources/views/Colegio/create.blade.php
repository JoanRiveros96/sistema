@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{url('/colegio')}}" method="post"enctype="multipart/form-data">
@csrf 

@include('colegio.form',['modo'=>'Crear'])



</form>
</div>
@endsection